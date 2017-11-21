<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Goutte;
use Illuminate\Support\Collection;
use Cache;
use File;
use Symfony\Component\DomCrawler\Crawler;

class IndexController extends Controller
{
    private $cache = 60 * 12;

    private $limit = 80;

    private $urls = [
        'http://campuse.ro/events/vire-um-curador-CPBR11/talk',
        'http://campuse.ro/events/vire-um-curador-CPBR11/workshop',
    ];

    /** @var  Collection */
    private $tags;

    /** @var  Collection */
    private $activities;

    public function index()
    {
        Carbon::setLocale('pt_BR');
        // Cache::flush();

        if (!Cache::has('activities')) {
            Cache::flush();

            $this->tags = collect();
            $this->activities = collect();

            collect($this->urls)->each(function ($url) {
                $this->getPage($url);
            });
        }

        /** @var Collection $activities */
        $activities = Cache::remember('activities', $this->cache, function () {
            // return $this->activities->sortByDesc('votes');
            return $this->getActivitiesAfterSnapshot($this->activities)
                        ->sortByDesc('votes');
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

        // do the snapshot
        // return response()->json(['stats' => ['activities' => $activities->count(), 'votes' => $activities->sum('votes'), 'updated_at' => $updated_at->toDateTimeString()], 'activities' => $activities->toArray()]);

        return view('index', compact('activities', 'tags', 'updated_at', 'limit', 'lastSelectedVotes'));
    }

    private function getActivitiesAfterSnapshot(Collection $activities)
    {
        // get snapshot
        $snapshotFile = resource_path('assets/snapshot_ranking_cpbr11.json');
        $snapshotContents = File::get($snapshotFile);
        $snapshotData = collect(json_decode($snapshotContents));

        // get activites from snapshot
        $snapshotActivities = collect($snapshotData->get('activities'));

        $activities = $activities->map(function (Collection $activity) use ($snapshotActivities) {
            $link = $activity->get('link');
            $votes = $activity->get('votes');

            // find the activity on snapshot
            $key = $snapshotActivities->search(function ($snapshotActivity) use ($link) {
                return $snapshotActivity->link == $link;
            });

            $snapshotActivity = $snapshotActivities->slice($key, 1)->first();

            // decreses votes
            $activity->put('votes', $votes - $snapshotActivity->votes);

            return $activity;
        });

        return $activities;
    }

    private function getPage($url, $page = 1, $pages = 1)
    {
        /** @var Crawler $client */
        $client = Goutte::request('GET', "{$url}?page={$page}");

        if ($page == 1) {
            $nextPageNode = $client
                ->filter('.pagination .list a')
                ->last();

            $pages = $nextPageNode->count() ? (int) $nextPageNode->text() : 1;
        }


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

        if ($page+1 <= $pages && $pages > 1) {
            $this->getPage($url, $page+1, $pages);
        }
    }
}
