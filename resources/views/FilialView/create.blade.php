@extends('templates.template')

@section('content')
<h1 class="text-center">@if(isset($filial)) Editar @else Cadastrar @endif</h1>
<div class="col-8 m-auto">
    @if(isset($errors) && count($errors)>0)
    <div class="text-center mt-4 mb-4 p-2 alert-danger">
        @foreach($errors->all() as $erro)
            {{$erro}}<br>
        @endforeach
    </div>
    @endif
    @if(isset($filial))
        <form name="formEdit" id="formEdit" method="post" action="{{ url("filial/$filial->id") }}">
            @method('PUT')
        @else
            <form name="formCad" id="formCad" method="post" action="{{ url('filial') }}">
        @endif
        @csrf
            <input class="form-control" type="text" name="nome" id="nome" maxlent="100" placeholder="Nome" value="{{ $filial->nome??''}}" required />

            <input class="form-control" type="text" name="endereco" id="endereco" maxlent="100" placeholder="Endereço" value="{{ $filial->endereco??'' }}" required />

            <input class="form-control registroEs" type="text" name="inscricao_estadual" maxlent="12" id="inscricao_estadual" placeholder="Inscricao Estadual"value="{{ $filial->inscricao_estadual??'' }}" required />

            <input class="form-control cnpj" type="text" name="cnpj" id="cnpj" maxlent="14" placeholder="CNPJ" value="{{ $filial->cnpj??'' }}" required />

            <input class="btn btn-primary mt-3" type="submit" value="@if(isset($filial)) Editar @else Cadastrar @endif">

            <button type="button" class="btn btn-warning mt-3" onclick="history.go(-1);">Voltar&emsp;<i class="fas fa-reply"></i></button>
        </form>
    </div>
@endsection
