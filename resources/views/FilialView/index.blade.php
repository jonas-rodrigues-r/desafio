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
      <th scope="col">Nome</th>
      <th scope="col">Inscrição Estadual</th>
      <th scope="col">CNPJ</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody class=".table-striped">
     	@foreach($filial as $filiais)
    	<tr>
        <td>{{$filiais->nome}}</td>
        <td class="registroEs">{{$filiais->inscricao_estadual}}</td>
        <td class="cnpj">{{$filiais->cnpj}}</td>
      <td>
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