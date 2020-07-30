@extends('templates.template')

@section('content')

<h1 class="text-center">Automóvel</h1>
<div class="text-center mt-3 mb-4">
    <a href="{{url('automovel/create')}}">
      	<button class="btn btn-success">Cadastrar</button>
    </a>
</div>

<div class="col-8 m-auto">
  @csrf
    <table class="table text-center">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Ano</th>
                <th scope="col">Modelo</th>
                <th scope="col">Filial</th>
                <th scope="col">Categoria</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($automovel as $automoveis)
            @php
            $categoria_automovel = $automoveis->find($automoveis->id)->relCategoria_automovel;
            $filial = $automoveis->find($automoveis->id)->relFilial;
            @endphp
            <tr>
                <td>{{$automoveis->nome}}</td>
                <td>{{$automoveis->ano}}</td>
                <td>{{$automoveis->modelo}}</td>
                <td>{{$filial->nome}}</td>
                <td>{{$categoria_automovel->nome}}</td>
                <td>
                    <a href="{{url("automovel/$automoveis->id")}}">
                        <button class="btn btn-dark" title="Visualizar"><i class="fas fa-eye"></i></button>
                    </a>
                    <a href="{{url("automovel/$automoveis->id/edit")}}">
                        <button class="btn btn-primary" title="Editar"><i class="fas fa-edit"></i></button>
                    </a>
                    <a href="{{url("automovel/$automoveis->id")}}" class="js-del">
                        <button class="btn btn-danger" title="Deletar"><i class="fas fa-trash"></i></button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
