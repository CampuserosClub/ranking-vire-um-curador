<!doctype html>
<html lang="en">
<head>
    <title>Ranking - Vire um Curador #CPBR12</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a class="navbar-brand" href="#">
                Ranking Não Oficial - Vire um Curador #CPBR12
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link"
                           href="http://brasil.campus-party.org/wp-content/uploads/sites/28/2018/11/CPBR12-Regulamento-Vire-um-Curador-.pdf"
                           target="_blank">
                            Regulamento
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="container">
            <div class="row mb-4">
                <div class="col-md-12">
                    @include('_infos')
                </div>
            </div>
            <div class="row mb-5 pb-3">
                <div class="col-md-3">
                    @include('_tags')
                </div>
                <div class="col-md-9">
                    @include('_activities')
                </div>
            </div>
        </main>

        <footer class="footer">
            <div class="container d-flex justify-content-between">
                <div>
                    <a href="http://maringeek.com.br" target="_blank">www.maringeek.com.br</a> - código por <a href="http://campuseros.club" target="_blank">Campuseros.Club</a>
                </div>
                <div class="text-muted">
                    <a href="https://github.com/CampuserosClub/ranking-vire-um-curador" title="Codado com amor; Veja no GitHub" target="_blank">
                        <i class="fa fa-code"></i> com <i class="fa fa-heart-o"></i>
                    </a>
                </div>
                <div>
                    <a href="http://twitter.com/jaonoctus">by @jaoNoctus</a> / alterações by <a href="http://github.com/jppcel">@jppcel</a>
                </div>
            </div>
        </footer>
    </div>

    <script src="{{ mix('/js/app.js') }}"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>
