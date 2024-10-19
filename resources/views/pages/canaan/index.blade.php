@extends('layouts.default')
@section('content')
<div class="container-index">
  <form class="form-index" action="/sistemaLogin" method="POST">
    @csrf
      <div class="mb-3" id="div1">
        <label class="form-label-index">CPF</label>
        <input type="text" class="form-control" >
      </div>
      <div class="mb-3">
        <label class="form-label-index">Senha</label>
        <input type="password" class="form-control" >
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>  
@endsection