@extends('templates.template')

@section('content')

<h1 class="text-center">Filial: {{ $filial->nome }}</h1>
<div class="col-8 m-auto">
    Nome: {{ $filial->nome }}<br>
    Endereco: {{ $filial->endereco }}<br>
    Inscricao Estadual: {{ $filial->inscricao_estadual }}<br>
    Endereço: {{ $filial->endereco }}<br>
    CNPJ: {{ $filial->cnpj }}

    <br>
    <a href="{{url("listarfuncionario/$filial->id")}}">
        <button class="btn btn-dark">Funcionario &emsp; <i class="fas fa-user"></i></button>
    </a>
    <a href="{{url("listarautomovel/$filial->id")}}">
        <button class="btn btn-dark">Automovel &emsp;<i class="fas fa-car"></i></button>
    </a>
    <br>
    <button type="button" class="btn btn-warning mt-3" onclick="history.go(-1);">Voltar&emsp;<i class="fas fa-reply"></i></button>
</div>
@endsection
