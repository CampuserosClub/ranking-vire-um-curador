<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Goutte;
use Illuminate\Support\Collection;
use Cache;
use Symfony\Component\DomCrawler\Crawler;

class IndexController extends Controller
{
    private $cache = 60 * 12;

    private $limit = 10;

    private $urls = [
        'http://campuse.ro/events/vire-um-curador-cpmg2-votacao/workshop',
        'http://campuse.ro/events/vire-um-curador-cpmg2-votacao/talk',
    ];

    /** @var  Collection */
    private $tags;

    /** @var  Collection */
    private $activities;

    public function index()
    {
        Carbon::setLocale('pt_BR');
//        Cache::flush();

        if (!Cache::has('activities')) {
            Cache::flush();

            $this->tags = collect();
            $this->activities = collect();

            collect($this->urls)->each(function ($url) {
                $client = Goutte::request('GET', $url);

                $client
                    ->filter('.row.collapse.table-body.light-theme')
                    ->each(function (Crawler $node) {
                        $link = $node->filter('a')->attr('href');
                        $title = $node->filter('a')->text();
                        $votes = (int) $node->filter('span')->text();
                        $tags = collect();

                        $node->filter('.activity-tag')->each(function (Crawler $node) use ($tags) {
                            $tagName = $node->text();
                            $tagID = str_slug($tagName);

                            $tags->push($tagName);

                            if (!$this->tags->has($tagID)) {
                                $this->tags->put($tagID, [
                                    'name' => $tagName,
                                    'count' => 1
                                ]);
                            } else {
                                $this->tags->transform(function ($tag, $key) use ($tagID) {
                                    if ($key == $tagID) {
                                        $tag = collect($tag)
                                            ->forget('count')
                                            ->put('count', $tag['count'] + 1)
                                            ->toArray();
                                    }

                                    return $tag;
                                });
                            }
                        });
                        $this->activities->push(collect(compact('link', 'title', 'votes', 'tags')));
                    });
            });
        }

        /** @var Collection $activities */
        $activities = Cache::remember('activities', $this->cache, function () {
            return $this->activities->sortByDesc('votes');
        });

        /** @var Collection $tags */
        $tags = Cache::remember('tags', $this->cache, function () {
            return $this->tags->sortByDesc('count');
        });

        /** @var Carbon $updated_at */
        $updated_at = Cache::remember('updated_at', $this->cache, function () {
            return Carbon::now();
        });

        $limit = $this->limit;
        $lastSelectedVotes = $activities->slice($limit-1, 1)->first()->get('votes');

        return view('index', compact('activities', 'tags', 'updated_at', 'limit', 'lastSelectedVotes'));
    }
}
