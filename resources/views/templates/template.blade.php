
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('assets/icon-page.png')}}">

    <title>Filial Brasil</title>

    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
    integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
    crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style_pag.css')}}">
    <script src="{{asset("js/jquery-3.5.1.min.js")}}"></script>
    <script src="{{asset("js/jquery.mask.js")}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style_cabecalho.css')}}">

  </head>

  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <span class="titulo">Filial Brasil</span>
        </div>
        <div class="mx-auto order-0">
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item userLog mt-2">
                    <p class=""><strong>Usuário:</strong> Behatris Fiorentini Ramires Behatris Fiorenteini</p>
                </li>
            </ul>
            <a href="/funcionariologout" class="ml-4">
                <button type="button" class="btn btn-warning">
                    <img src="{{asset('assets/sign-out.ico')}}" alt="Sair" title="Sair" width=30 height=30>
                </button>
            </a>
        </div>
    </nav>

    <div class="container body-content">
        @yield('content')
    </div>

    <script src="{{asset("js/jquery-3.5.1.min.js")}}"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
  </body>

    <footer class="page-footer font-small teal pt-2 fixar-rodape">
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="https://www.facebook.com/jonast652"> Jonas Rodrigues Ramires</a>
        </div>
    </footer>
</html>
