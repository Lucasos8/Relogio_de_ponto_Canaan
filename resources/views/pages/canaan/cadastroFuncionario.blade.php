@extends('layouts.default')
@section('content')
<div class="container-CF">
<form class="form-CF" action="/cadastroFuncionario" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{isset($user)?$user->id:null}}">
   
    <div>
        <label class="form-label-CF for=">Nome completo</label>
        <br>
        <input type="text" placeholder="Nome completo." name="nome_user" value="{{isset($user)?$user->nome_user:''}}"> 
    </div>
   
    <div>
        <label class="form-label-CF" for="">CPF</label>
        <br>
        <input type="text" placeholder="CPF." name="cpf_user" value="{{isset($user)?$user->cpf_user:''}}"> 
    </div>   
    
    <div>
    <label class="form-label-CF" for="">Data de aniversário.</label>
    <br>
    <input type="text" placeholder="Data de aniversário" name="nascimento_user" value="{{isset($user)?$user->nascimento_user:''}}"> 
    </div> 
    
    <div>
        <label class="form-label-CF" for="">Senha</label>
        <br>
        <input type="text" placeholder="Senha." name="senha_user" value="{{isset($user)?$user->senha_user:''}}"> 
    </div>    
    
    <div>
        <label class="form-label-CF" for="">Cargo</label>
        <br>
        <input type="text" placeholder="Cargo." name="cargo_user" value="{{isset($user)?$user->cargo_user:''}}">
    </div>    
    
    <div>
        <br>
        <select id="nivel_acesso_select" class="form-select form-select-sm" aria-label="Small select example">
            <option selected>Nivel Do Usuário</option>
            @foreach ($niveis_acessos as $nivel_acesso)
                <option value="{{$nivel_acesso->id}}">{{$nivel_acesso->nivel_user}}</option>
            @endforeach
            </select>
          <br>
    </div>
        <button type="submit" class="btn btn-outline-success">Cadastrar</button>
</form>  
</div>
@endsection