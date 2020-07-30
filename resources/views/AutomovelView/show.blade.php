@extends('templates.template')

@section('content')
<h1 class="text-center">Visualizar</h1>
<div class="col-8 m-auto">
  @php
  $filial=$automovel->find($automovel->id)->relFilial;
  $categoria_automovel=$automovel->find($automovel->id)->relCategoria_automovel;
  @endphp
    Nome: {{ $automovel->nome }}<br>
    Filial: {{ $filial->nome }}<br>
    Ano: {{ $automovel->ano }}<br>
    Modelo: {{ $automovel->modelo }}<br>
    Cor: {{ $automovel->cor }}<br>
    Nº Chassi: {{ $automovel->n_chassi }}<br>
    Categoria Do Automovel: {{ $categoria_automovel->nome }}
    <br>
    <button type="button" class="btn btn-warning mt-3" onclick="history.go(-1);">Voltar&emsp;<i class="fas fa-reply"></i></button>
</div>
@endsection
