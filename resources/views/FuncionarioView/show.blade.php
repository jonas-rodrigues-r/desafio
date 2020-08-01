@extends('templates.template')

@section('content')

<h1 class="text-center">Visualizar</h1>
<div class="col-8 m-auto">
    @php
    $filial = $funcionario->find($funcionario->id)->relFilial;
    @endphp

<div class="container">
    <div class="row mt-1">
      <div class="col-2">
        <span><b>Nome:</b></span>
      </div>
      <div class="col-6">
        <input readonly class="form-control" type="text" name="nome" id="nome" 
        value="{{ $funcionario->nome }}" />
      </div>
    </div>

    <div class="row mt-1">
        <div class="col-2">
            <span><b>Sexo:</b></span>
        </div>
        <div class="col-6">
            <input readonly class="form-control" type="text" name="nome" id="nome" 
            value="{{ $funcionario->sexo == "M" ? "Masculino" : "Feminino" }}" />
        </div>
      </div>

      <div class="row mt-1">
        <div class="col-2">
            <span><b>Data Nascimento: </b></span>
        </div>
        <div class="col-6">
            <input readonly class="form-control data" type="text" name="nome" id="nome" 
            value="{{ date('d/m/Y', strtotime($funcionario->data_nascimento)) }} " />
        </div>
      </div>

      <div class="row mt-1">
        <div class="col-2">
            <span><b>CPF:</b></span>
        </div>
        <div class="col-6">
            <input readonly class="form-control cpf" type="text" name="nome" id="nome" 
            value="{{ $funcionario->cpf }}" />
        </div>
      </div>

      <div class="row mt-1">
        <div class="col-2">
            <span><b>Endereço:</b></span>
        </div>
        <div class="col-6 mr-5">
            <input readonly class="form-control" type="text" name="nome" id="nome" 
            value="{{ $funcionario->endereco }}" />
        </div>
      </div>

      <div class="row mt-1">
        <div class="col-2">
            <span><b>Cargo</b></span>
        </div>
        <div class="col-6">
            <input readonly class="form-control" type="text" name="nome" id="nome" 
            value="{{ $funcionario->cargo }}" />
        </div>
      </div>

      <div class="row mt-1">
        <div class="col-2">
            <span><b>Salario:</b></span>
        </div>
        <div class="col-6">
            <input readonly class="form-control dinheiro" type="text" name="nome" id="nome" 
            value="{{ $funcionario->salario }}" />
        </div>
      </div>

      <div class="row mt-1">
        <div class="col-2">
            <span><b>Status: </b></span>
        </div>
        <div class="col-6">
            <input readonly class="form-control" type="text" name="nome" id="nome" 
            value="{{ $funcionario->situacao == true ? "Ativo" : "Inativo"}}" />
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
  </div>
    <br>
    <button type="button" class="btn btn-warning mt-3" onclick="history.go(-1);">Voltar&emsp;<i class="fas fa-reply"></i></button>
</div>
@endsection
