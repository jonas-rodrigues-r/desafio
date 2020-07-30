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
	<script src="{{asset("js/validacoes.js")}}"></script>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm col-md-8"></div>
			<div class="col-sn col-md-4">
				<br>
		    <p>Usuario: <strong>{{Session('funcionario')}}</strong></p>
				<a href="/funcionariologout">Logout</a>
				<title>Filial</title>
			</div>
		</div>

		</div>

	</div>
</head>
<body>
@yield('content')
<script src="{{asset("js/javascrip.js")}}"></script>
<script src="{{asset("js/masks.js")}}"></script>
</body>
</html>
