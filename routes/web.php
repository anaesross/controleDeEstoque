<?php

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


 
Auth::routes();
Route::get('login/google', 'Auth\LoginController@redirectToGoogle'); // login do google
Route::get('login/google/callback', 'Auth\LoginController@receiveDataGoogle');//rota para pagina depois de logado



Route::get('/home', 'HomeController@index')->name('home');


Route::get('/produtos/cadastrar', 'ProductController@viewForm')->middleware('checkuser');
Route::post('/produtos/cadastrar', 'ProductController@create')->middleware('checkuser');


Route::get('/produtos/atualizar/{id?}', 'ProductController@viewFormUpdate')->middleware('checkuser'); //mostra a view
Route::post('/produtos/atualizar', 'ProductController@update')->middleware('checkuser'); //envia para o controller para fazer a atualização

Route::get('/produtos', 'ProductController@viewAllProducts')->middleware('checkuser');//visualizar os produtos

Route::get('/produtos/deletar/{id?}', 'ProductController@delete')->middleware('checkuser'); //deletar produto

