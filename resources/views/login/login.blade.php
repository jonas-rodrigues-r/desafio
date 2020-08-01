@extends('templates.app')
@section('conteudo')

<div class="container">
    @yield('conteudo')
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Filial Brasil</h3>
            </div>
           
            <div class="card-body"> 
                @include('validacao.erros')   
            <form method="POST" action="{{ url("FazerLogin") }}">
                {{ csrf_field() }}
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input id="cpf" type="text" name="cpf" class="form-control cpf" placeholder="Informe seu CPF" required>
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input id="password"type="password" name="password" class="form-control" placeholder="Informe sua senha" required >
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Entrar" class="btn float-right login_btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection