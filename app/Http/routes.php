<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

/*
|--------------------------------------------------------------------------
| Envio de contato
|--------------------------------------------------------------------------
|
| Deve retornar boolean de acordo com o status do envio da mensagem
| ou um erro caso a mensagem esteja vazia.
|
*/

Route::controller('email', 'EmailController');
