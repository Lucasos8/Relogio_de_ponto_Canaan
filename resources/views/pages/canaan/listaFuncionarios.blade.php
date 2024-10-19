@extends('layouts.default')
@section('content')
<h2>Lista de Funcionarios</h2>    
<?php

date_default_timezone_set("America/Sao_Paulo");

$dataAtual = date("d-m-y");

?>
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Nome</td>
                <td>CPF</td>
                <td>Nascimento</td> 
                <td>Senha</td>
                <td>Cargo</td>
                <td>Atualizar dados</td>
                <td>Registrar horas</td>
                <td>Consultar horas</td>
                </tr>
        </thead>
        @csrf
        <tbody>
            @foreach($users as $user)  
            <tr>
                <td>{{$user->nome}}</td>
                <td>{{$user->cpf}}</td>
                <td>{{$user->nascimento}}</td>
                <td>{{$user->senha}}</td>
                <td>{{$user->cargo}}</td>
                <td><a class="btn btn-outline-primary" href="{{route('canaan.edit',['id' => $user->id])}}">Editar</a></td>
                <td><a class="btn btn-outline-primary" href="{{route('canaan.registraHoras',['idUser' => $user->id])}}">Registrar horas</a></td>
                <td><a class="btn btn-outline-primary" href="{{route('canaan.acessaHoras')}}">Consultar horas</a></td>
                </tr>
            @endforeach
        </tbody>        
    </table>
@endsection