@extends('layouts.default')
@section('content')
<div class="container-index">
  <form class="form-index">
    @csrf
      <div class="mb-3" id="div1">
        <label for="exampleInputEmail1" class="form-label-index">nome</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label-index">Senha</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>  
@endsection