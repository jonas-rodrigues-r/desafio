<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','FuncionarioController@ApresentarLogin');
Route::post('/FazerLogin','FuncionarioController@FazerLogin');
Route::get('/funcionariologout','FuncionarioController@logout');



Route::resource('/funcionario','FuncionarioController');

Route::resource('/filial','FilialController');

Route::resource('/automovel','AutomovelController');

Route::get('listarautomovel/{id}','AutomovelController@getAutomovel')
->where('id', '[0-9]+');

Route::get('listarfuncionario/{id}','FuncionarioController@getFuncionario')
->where('id', '[0-9]+');
Route::get('aplicacaoindex','AplicacaoController@apresentarPaginaInicial');
