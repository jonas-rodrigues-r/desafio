@extends('templates.template')

@section('content')
<h1 class="text-center">Filial</h1>
<div class="text-center mt-3 mb-4">
  <a href="{{url('filial/create')}}">
      		<button class="btn btn-success">Cadastrar</button>
        </a>
        
        
</div>

<div class="col-8 m-auto">
  @csrf
	<table class="table table-striped text-center">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nome</th>
      <th scope="col">Endereço</th>
      <th scope="col">Inscrição Estadual</th>
      <th scope="col">CNPJ</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody class=".table-striped">
     	@foreach($filial as $filiais)
    	<tr>
      <th scope="row">{{$filiais->id}}</th>
      <td>{{$filiais->nome}}</td>
      <td>{{$filiais->endereco}}</td>
      <td>{{$filiais->inscricao_estadual}}</td>
      <td>{{$filiais->cnpj}}</td>
      
      <td>
      	<a href="{{url("filial/$filiais->id")}}">
      		<button class="btn btn-dark" title="Visualizar"><i class="fas fa-eye"></i></button>
      	</a>
      	<a href="{{url("filial/$filiais->id/edit")}}">
      		<button class="btn btn-primary" title="Editar"><i class="fas fa-edit"></i></button>
      	</a>
      	<a href="{{url("filial/$filiais->id")}}" class="js-del">
      		<button class="btn btn-danger" title= "Deletar"><i class="fas fa-trash"></i></button>
        </a>
        <a href="{{url("filial/$filiais->id")}}">
      		<button class="btn btn-secondary" title="Gerenciar"><i class="fas fa-wrench"></i></button>
      	</a>
      </td>
    </tr>
  	@endforeach
    
    
  </tbody>
</table>
{!!$filial->links()!!}
</div>
@endsection