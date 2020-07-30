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
                        <input id="cpf" type="text" name="cpf" class="form-control" placeholder="Informe seu CPF" >
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input id="password"type="password" name="password" class="form-control" placeholder="Informe sua senha" >
                    </div>
                    <div id="divMsg">
                      {!!$errors->first('cpf','<span class="help-block">message</span>')!!}
                      <br>
                      {!!$errors->first('password','<span class="help-block">Senha: message</span>')!!}
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