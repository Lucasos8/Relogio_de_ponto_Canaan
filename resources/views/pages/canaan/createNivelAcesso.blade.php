@extends('layouts.default')
@section('content')
<div class="container-CF">
  <form class="form-CF" action="/createNivelUser" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{isset($nivelAcesso)?$nivelAcesso->id:null}}">
     <div>
        <label class="form-label-CF for=">Nome do nivel user</label>
        <br>
        <input type="text" placeholder="Nome do nivel user." name="nivel_user" value="{{isset($nivelAcesso)?$nivelAcesso->nivel_user:''}}"> 
    </div>
    <button type="submit" class="btn btn-outline-success">Cadastrar</button>
  </form>
@endsection