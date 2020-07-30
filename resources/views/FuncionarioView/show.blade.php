@extends('templates.template')

@section('content')

<h1 class="text-center">Visualizar</h1>
<div class="col-8 m-auto">
    @php
    $filial = $funcionario->find($funcionario->id)->relFilial;
    @endphp

    Nome: {{ $funcionario->nome }}<br>
    Sexo: {{ $funcionario->sexo }}<br>
    Data Nascimento: {{ date('d/m/Y', strtotime($funcionario->data_nascimento)) }}<br>
    CPF: {{ $funcionario->cpf }}<br>
    Endereço: {{ $funcionario->endereco }}<br>
    Cargo: {{ $funcionario->cargo }}<br>
    Salario: {{ $funcionario->salario }}<br>
    Situação: {{ $funcionario->situacao }}<br>
    Filial: {{ $filial->nome }}<br>
    CNPJ: {{ $filial->cnpj }}

    <br>
    <button type="button" class="btn btn-warning mt-3" onclick="history.go(-1);">Voltar&emsp;<i class="fas fa-reply"></i></button>
</div>
@endsection
