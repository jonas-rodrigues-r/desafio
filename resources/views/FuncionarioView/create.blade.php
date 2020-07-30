@extends('templates.template')

@section('content')

<h1 class="text-center">@if(isset($funcionario)) Editar @else Cadastrar @endif</h1>
<div class="col-8 m-auto">
    @if(isset($errors) && count($errors)>0)
    <div class="text-center mt-4 mb-4 p-2 alert-danger">
        @foreach($errors->all() as $erro)
            {{$erro}}<br>
        @endforeach
    </div>
    @endif
    @if(isset($funcionario))
        <form name="formEdit" id="formEdit" method="post" action="{{ url("funcionario/$funcionario->id") }}" onsubmit="validaFuncionario();">
        @method('PUT')
    @else
        <form name="formCad" id="formCad" method="post" action="{{ url('funcionario') }}">
    @endif
            @csrf
            <input class="form-control" type="text" name="nome" id="nome" maxlength="100" placeholder="Nome" value="{{ $funcionario->nome??'' }}" required />

            <select class="form-control" name="id_filial" id="id_filial"value="{{ $funcionario->id_filial??'' }}" required >
                <option value="{{ $funcionario->relFilial->id??'' }}">{{ $funcionario->relFilial->nome??'Filial' }}</option>
                @foreach($filial as $filiais)
                <option value="{{ $filiais->id }}">{{ $filiais->nome }}</option>
                @endforeach
            </select>

            <input class="form-control data" type="text" name="data_nascimento" id="data_nascimento" placeholder="Data De Nascimento"
            value="{{ isset($funcionario->data_nascimento) ? date('m/d/Y', strtotime($funcionario->data_nascimento)): ''}}" required />

            <select class="form-control" name="sexo" id="sexo" required >
                <option value="">Selecione um sexo</option>
                <option value="M" {{ isset($funcionario->sexo) && $funcionario->sexo == "M" ? "selected" : "false" }}>Masculino</option>
                <option value="F" {{ isset($funcionario->sexo) && $funcionario->sexo == "F" ? "selected" : "false" }}>Feminino</option>
            </select>

            <input class="form-control cpf" type="text" name="cpf" id="cpf" maxlength="14" placeholder="CPF" value="{{ $funcionario->cpf??'' }}" required />

            <input class="form-control" type="text" name="endereco" maxlength="100" id="endereco" placeholder="Endereço"value="{{ $funcionario->endereco??'' }}" required />

            <input class="form-control" type="text" name="cargo" id="cargo" maxlength="50" placeholder="Cargo"value="{{ $funcionario->cargo??'' }}"required />

            <input class="form-control dinheiro" type="text" name="salario" id="salario" placeholder="Salario"value="{{ $funcionario->salario??'' }}" required />

            <select class="form-control" name="situacao" id="situacao" required >
                <option value="">Situação</option>
                <option value="1" {{ isset($funcionario->situacao) && $funcionario->situacao ? "selected" : "" }}>Ativo</option>
                <option value="0" {{ isset($funcionario->situacao) && !$funcionario->situacao ? "selected" : "" }}>Inativo</option>
            </select>

            <input class="form-control" type="text" name="password" id="password" placeholder="Senha" value="{{ $password ?? '' }}" required readonly />

            <input class="btn btn-primary mt-3" type="submit" value="@if(isset($funcionario)) Editar @else Cadastrar @endif">

            <button type="button" class="btn btn-warning mt-3" onclick="history.go(-1);">Voltar&emsp;<i class="fas fa-reply"></i></button>


  </form>
</div>
@endsection
