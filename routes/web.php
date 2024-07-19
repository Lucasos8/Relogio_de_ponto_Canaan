<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\Canaan\CanaanController@index')->name('canaan.index');

Route::get('/listaFuncionarios', 'App\Http\Controllers\Canaan\CanaanController@listaFuncionarios')->name('canaan.listaFuncionarios');

Route::get('/acessaHoras', 'App\Http\Controllers\Canaan\CanaanController@acessaHoras')->name('canaan.acessaHoras');

Route::get('/cadastroFuncionario', 'App\Http\Controllers\Canaan\CanaanController@cadastroFuncionario')->name('canaan.cadastroFucionario');

Route::get('/registraHoras', 'App\Http\Controllers\Canaan\CanaanController@registraHoras')->name('canaan.registraHoras');

Route::get('/createNivelAcesso', 'App\Http\Controllers\Canaan\CanaanController@createNivelAcesso')->name('canaan.createNivelAcesso');

Route::post('/createNivelUser', 'App\Http\Controllers\Canaan\CanaanController@createNivelUser')->name('canaan.createNivelUser');