<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="">

  <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('css/style_pag.css')}}">
  <script src="{{asset("js/jquery-3.5.1.min.js")}}"></script>
  <script src="{{asset("js/jquery.mask.js")}}"></script>

  
  <div class="container-fluid">
    <div class="row">
      
      <title>Filial</title>
        <header>
          
          <div class="col-lg-12" style="text-align: right;">
            <p>Usuario: <strong>{{Session('funcionario')}}</strong></p>
            <a href="/funcionariologout">
              <button type="button" class="btn btn-danger">Logout</button>
            </a>
        </div>
        </header>
              
    </div>

  </div>
</head>
<body>
  @yield('content') 

   <div class="content">
      </div>
      <footer id="myFooter">
          <div class="container">
              <ul>
                  <li><a href="">Informações da Empresa</a></li>
                  <li><a href="">Contato</a></li>
                  <li><a href="">Blog</a></li>
                  <li><a href="">Cursos</a></li>
              </ul>
              <p class="footer-copyright">© 2020 Copyright - Filial Brasil</p>
          </div>
        </footer>
  

      <script src="{{asset("js/javascrip.js")}}"></script>
      <script src="{{asset("js/masks.js")}}"></script>
  </body>
</html>
