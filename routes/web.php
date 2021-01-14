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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/clientes', 'App\Http\Controllers\ClientesController@index')
	->name('clientes.index');
Route::get('/encomendas', 'App\Http\Controllers\EncomendasController@index')
	->name('encomendas.index');	
Route::get('/produtos', 'App\Http\Controllers\ProdutosController@index')
	->name('produtos.index');	
Route::get('/vendedores', 'App\Http\Controllers\VendedoresController@index')
	->name('vendedores.index');

Route::get('/clientes/{id}/show', 'App\Http\Controllers\ClientesController@show')
	->name('clientes.show');
Route::get('/encomendas/{id}/show', 'App\Http\Controllers\EncomendasController@show')
	->name('encomendas.show');
Route::get('/produtos/{id}/show', 'App\Http\Controllers\ProdutosController@show')
	->name('produtos.show');
Route::get('/vendedores/{id}/show', 'App\Http\Controllers\VendedoresController@show')
	->name('vendedores.show');
Route::post('/mostrar', 'App\Http\Controllers\EncomendasController@mostrar')
	->name('processar.form');	

//Create

Route::get('/clientes/create', 'App\Http\Controllers\ClientesController@create')
	->name('clientes.create');
Route::get('/encomendas/create', 'App\Http\Controllers\EncomendasController@create')
	->name('encomendas.create');
Route::get('/vendedores/create', 'App\Http\Controllers\VendedoresController@create')
	->name('vendedores.create');
Route::get('/produtos/create', 'App\Http\Controllers\ProdutosController@create')
	->name('produtos.create');			

//Store	

Route::post('/clientes','App\Http\Controllers\ClientesController@store')
	->name('clientes.store');
Route::post('/encomendas', 'App\Http\Controllers\EncomendasController@store')
	->name('encomendas.store');
Route::post('/vendedores', 'App\Http\Controllers\VendedoresController@store')
	->name('vendedores.store');
Route::post('/produtos', 'App\Http\Controllers\ProdutosController@store')
	->name('produtos.store');

//Edits e Updates

Route::get('/clientes/{id}/edit','App\Http\Controllers\ClientesController@edit')
	->name('clientes.edit');
Route::patch('/clientes/{id}','App\Http\Controllers\ClientesController@update')
	->name('clientes.update');	
Route::get('/encomendas/{id}/edit','App\Http\Controllers\EncomendasController@edit')
	->name('encomendas.edit');
Route::patch('/encomendas/{id}','App\Http\Controllers\EncomendasController@update')
	->name('encomendas.update');	
Route::get('/vendedores/{id}/edit','App\Http\Controllers\VendedoresController@edit')
	->name('vendedores.edit');
Route::patch('/vendedores/{id}','App\Http\Controllers\VendedoresController@update')
	->name('vendedores.update');	
Route::get('/produtos/{id}/edit','App\Http\Controllers\ProdutosController@edit')
	->name('produtos.edit');
Route::patch('/produtos/{id}','App\Http\Controllers\ProdutosController@update')
	->name('produtos.update');		