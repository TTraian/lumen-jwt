<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->group(['prefix' => 'api/v1'], function () use ($router) {
    $router->get('/', function () use ($router) {
        return $router->app->version();
    });

    $router->group(['prefix' => 'auth'], function () use ($router) {
        $router->post('login', 'Auth\LoginController@login');
        $router->post('register', 'Auth\RegisterController@register');
    });

    $router->group(['middleware' => 'auth'], function () use ($router){
        $router->get('test', function(){
            return "You have access";
        });
    });
});
