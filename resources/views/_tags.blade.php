<div class="card bg-dark">
    <div class="card-header text-white">Categorias</div>
    <ul class="list-group list-group-flush">
        @foreach($tags as $tag)
            <li class="list-group-item">
                {{ $tag['name'] }}
                <span class="badge badge-secondary float-right">
                    {{ $tag['count'] }}
                </span>
            </li>
        @endforeach
    </ul>
</div>