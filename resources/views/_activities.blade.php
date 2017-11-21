<activities inline-template>
    <div class="card border-dark">
        <div class="card-header bg-dark text-white">Atividades</div>
        <div class="card-text">
            <table class="table mb-0">
                <thead>
                <tr>
                    <th width="10%"></th>
                    <th>Nome</th>
                    <th width="5%">Participantes</th>
                </tr>
                </thead>
                <tbody>
                @foreach($activities as $activity)
                    <tr class="{{ $loop->iteration > $limit ? 'table-danger' : '' }}"
                        v-show="filter({{ $activity->get('tags') }})">
                        <td class="text-center">{{ $loop->iteration }}º</td>
                        <td>
                            <a href="http://campuse.ro{{ $activity->get('link') }}" target="_blank">
                                {{ $activity->get('title') }}
                            </a>
                            <br>
                            @foreach($activity->get('tags') as $tag)
                                <small class="badge badge-secondary">
                                    {{ $tag }}
                                </small>
                            @endforeach
                        </td>
                        <td class="text-right">{{ $activity->get('votes') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</activities>