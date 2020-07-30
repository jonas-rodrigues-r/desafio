@extends('templates.template')

@section('content')
<h1 class="text-center">Funcionario</h1>
<div class="text-center mt-3 mb-4">
  <a href="{{url("funcionario/create")}}">
    <button class="btn btn-success">Cadastrar</button>
  </a>
</div>

<div class="col-8 m-auto">
  @csrf
    <table class="table text-center">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Nome</th>
            <th scope="col">Cargo</th>
            <th scope="col">Sexo</th>
            <th scope="col">Filial</th>
            <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($funcionario as $funcionarios)
            @php
            $filial = $funcionarios->find($funcionarios->id)->relFilial;
            @endphp
            <tr>
                <td>{{ $funcionarios->nome }}</td>
                <td>{{ $funcionarios->cargo }}</td>
                <td>{{ $funcionarios->sexo }}</td>
                <td>{{ $filial->nome }}</td>
                <td>
                    <a href="{{ url("funcionario/$funcionarios->id") }}">
                        <button class="btn btn-dark" title="Visualizar"><i class="fas fa-eye"></i></button>
                    </a>
                    <a href="{{ url("funcionario/$funcionarios->id/edit") }}">
                        <button class="btn btn-primary" title="Editar"><i class="fas fa-edit"></i></button>
                    </a>
                    <a href="{{ url("funcionario/$funcionarios->id") }}" class="js-del">
                        <button class="btn btn-danger" title="Deletar"><i class="fas fa-trash"></i></button>
                    </a>
                </td>
            </tr>
  	        @endforeach
        </tbody>
    </table>
</div>
@endsection
