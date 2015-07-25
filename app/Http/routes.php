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

Route::any('/contact', function () {

    $message = trim(strip_tags(Request::get('message')));

    if(!empty($message)) {

        $result = Mail::raw($message, function ($message) {

            $message->from(Request::get('email', 'site@phpmga.net'), Request::get('name', 'Contato pelo site'));
            $message->sender(Request::get('email', 'site@phpmga.net'), Request::get('name', 'Contato pelo site'));
            $message->subject(Request::get('subject', 'Contato pelo site'));

            $message->to('contato@phpmga.net', 'PHP-MGA');
        });

        return Response::make($result);

    } else {
        return Response::json(['error' => 'Digite uma mensagem!']);
    }
});
