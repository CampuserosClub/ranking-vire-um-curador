<!doctype html>
<html lang="en">
<head>
    <title>Vire um Curador #CPMG2</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <style>
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 60px; /* Set the fixed height of the footer here */
            line-height: 60px; /* Vertically center the text there */
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            Ranking - Vire um Curador #CPMG2
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link"
                       href="http://brasil.campus-party.org/wp-content/uploads/sites/2/2017/10/VireUmCuradorCPMG2.0610.pdf"
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
                <p class="text-center">
                    <a href="http://campuseros.club" class="navbar-brand" target="_blank">
                        <img src="https://i.imgur.com/au8IA6w.png" height="120px" />
                    </a>
                </p>
                @include('_disclaimer')
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                @include('_infos')
            </div>
        </div>
        <div class="row">
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
                <a href="http://campuseros.club" target="_blank">www.campuseros.club</a>
            </div>
            <div class="text-muted">
                <a href="https://github.com/CampuserosClub/ranking-vire-um-curador" title="Codado com amor; Veja no GitHub" target="_blank">
                    <i class="fa fa-code"></i> com <i class="fa fa-heart-o"></i>
                </a>
            </div>
            <div>
                <a href="http://twitter.com/jaonoctus">by @jaoNoctus</a>
            </div>
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>