@extends('templates.template')

@section('content')
<h1 class="text-center">Visualizar</h1>
<div class="col-8 m-auto">
  @php
  $filial=$automovel->find($automovel->id)->relFilial;
  $categoria_automovel=$automovel->find($automovel->id)->relCategoria_automovel;
  @endphp




<div class="container">
  <div class="row mt-1">
    <div class="col-2">
      <span><b>Nome:</b></span>
    </div>
    <div class="col-6">
      <input readonly class="form-control" type="text" name="nome" id="nome" 
      value="{{ $automovel->nome }}" />
    </div>
  </div>

  <div class="row mt-1">
      <div class="col-2">
          <span><b>Filial:</b></span>
      </div>
      <div class="col-6">
          <input readonly class="form-control" type="text" name="nome" id="nome" 
          value="{{ $filial->nome }}" />
      </div>
    </div>

    <div class="row mt-1">
      <div class="col-2">
          <span><b>Ano: </b></span>
      </div>
      <div class="col-6">
          <input readonly class="form-control" type="text" name="nome" id="nome" 
          value="{{ $automovel->ano }} " />
      </div>
    </div>

    <div class="row mt-1">
      <div class="col-2">
          <span><b>Modelo:</b></span>
      </div>
      <div class="col-6">
          <input readonly class="form-control" type="text" name="nome" id="nome" 
          value="{{ $automovel->modelo }}" />
      </div>
    </div>

    <div class="row mt-1">
      <div class="col-2">
          <span><b>Cor:</b></span>
      </div>
      <div class="col-6 mr-5">
          <input readonly class="form-control" type="text" name="nome" id="nome" 
          value="{{ $automovel->cor }}" />
      </div>
    </div>

    <div class="row mt-1">
      <div class="col-2">
          <span><b>Nº Chassi:</b></span>
      </div>
      <div class="col-6">
          <input readonly class="form-control" type="text" name="nome" id="nome" 
          value="{{ $automovel->n_chassi }}" />
      </div>
    </div>

    <div class="row mt-1">
      <div class="col-2">
          <span><b>Categoria Aut.:</b></span>
      </div>
      <div class="col-6">
          <input readonly class="form-control" type="text" name="nome" id="nome" 
          value="{{ $categoria_automovel->nome }}" />
      </div>
    </div>
</div>
    <br>
    <button type="button" class="btn btn-warning mt-3" onclick="history.go(-1);">Voltar&emsp;<i class="fas fa-reply"></i></button>
</div>
@endsection
