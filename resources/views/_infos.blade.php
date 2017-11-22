<div class="card-group">
    <div class="card bg-dark text-white">
        <div class="card-body">
            <h4 class="card-title">Atividades</h4>
            <h3 class="card-text">
                {{ $activities->count() }}
            </h3>
        </div>
    </div>
    <div class="card bg-dark text-white">
        <div class="card-body">
            <h4 class="card-title">Votos</h4>
            <h3 class="card-text">
                {{ $activities->sum('votes') }}
            </h3>
        </div>
    </div>
    <div class="card bg-dark text-white">
        <div class="card-body">
            <h4 class="card-title">Nota de corte</h4>
            <h3 class="card-text">
                {{ $lastSelectedVotes }}
            </h3>
        </div>
    </div>
    <div class="card bg-dark text-white">
        <div class="card-body">
            <h4 class="card-title">Última atualização</h4>
            <h5 class="card-text">
                {{ $updated_at->diffForHumans() }}
                <a href="?update=1"
                   title="Limpar o cache agora"
                   class="btn btn-sm btn-custom-white">
                    <small><i class="fa fa-refresh"></i></small>
                </a>
            </h5>

        </div>
    </div>
</div>