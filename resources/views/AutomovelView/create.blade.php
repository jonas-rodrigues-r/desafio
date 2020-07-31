@extends('templates.template')

@section('content')

<h1 class="text-center">@if(isset($automovel)) Editar @else Cadastrar @endif</h1>
<div class="col-8 m-auto">
    @if(isset($errors) && count($errors)>0)
    <div class="text-center mt-4 mb-4 p-2 alert-danger">
        @foreach($errors->all() as $erro)
            {{ $erro }}<br>
        @endforeach
    </div>
    @endif
    @if(isset($automovel))
        <form name="formEdit" id="formEdit" method="POST" action="{{ url("automovel/editar/$automovel->id") }}">
        @method('PUT')
    @else
        <form name="formCad" id="formCad" method="POST" action="{{ url('automovel') }}">
    @endif
    @csrf
            <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome" value="{{ $automovel->nome??''}}" required >

            <select class="form-control" name="id_filial" id="id_filial"value="{{ $automovel->id_filial??'' }}" required>
                <option value="{{ $automovel->relFilial->id??'' }}">{{ $automovel->relFilial->nome??'Filial' }}</option>
                @foreach($filial as $filiais)
                    <option value="{{$filiais->id}}">{{$filiais->nome}}</option>
                @endforeach
            </select>

            <select class="form-control" name="id_categoria_automovel" id="id_categoria_automovel" value="{{ $automovel->id_categoria_automovel??'' }}" required >
                <option value="{{ $automovel->relCategoria_Automovel->id??'' }}">{{ $automovel->relCategoria_Automovel->nome??'Categoria' }}</option>
                @foreach($categoria as $categorias)
                    <option value="{{ $categorias->id }}">{{ $categorias->nome }}</option>
                @endforeach
            </select>

            <input class="form-control" type="text" name="ano" id="ano" maxlength="4" placeholder="Ano"value="{{ $automovel->ano??'' }}" required />

            <input class="form-control" type="text" name="modelo" id="modelo" maxlength="50" placeholder="Modelo"value="{{ $automovel->modelo??'' }}" required />

            <input class="form-control" type="text" name="cor" id="cor" maxlength="50" placeholder="Cor"value="{{ $automovel->cor??'' }}" required />

            <input class="form-control" type="text" name="n_chassi" id="n_chassi" maxlength="17" placeholder="Nº chassi" value="{{ $automovel->n_chassi??'' }}" required />

            <input class="btn btn-primary mt-3" type="submit" value="@if(isset($automovel)) Editar @else Cadastrar @endif" />

            <button type="button" class="btn btn-warning mt-3" onclick="history.go(-1);">Voltar&emsp;<i class="fas fa-reply"></i></button>

        </form>
    </div>
@endsection
