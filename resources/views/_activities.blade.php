<activities inline-template v-cloak>
    <div class="card border-dark">
        <div class="card-header bg-dark text-white">
            <div class="row d-flex align-items-center">
                <div class="col-md-6">Atividades</div>
                <div class="col-md-6">
                    <div class="input-group-sm">
                        <input type="text"
                               v-model="search"
                               placeholder="Pesquisar pelo título"
                               class="form-control search-input">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-text">
            <table class="table mb-0">
                <thead>
                <tr>
                    <th width="10%"></th>
                    <th>Título</th>
                    <th width="5%">Participantes</th>
                </tr>
                </thead>
                <tbody>
                @foreach($activities as $activity)
                    <tr class="{{ $loop->iteration > $limit ? 'table-danger' : '' }}"
                        v-show="filterByTag({{ $activity->get('tags') }}) && filterByTitle('{{ $activity->get('title') }}')">
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