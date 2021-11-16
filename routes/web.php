<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->group(
    ['prefix' => 'api'],
    function () use ($router) {
        $router->post('login',  ['uses' => 'AuthController@login']);
        $router->post('register',  ['uses' => 'AuthController@register']);
        $router->get('articles',  ['uses' => 'ArticleController@index']);
        $router->post('articles',  ['uses' => 'ArticleController@store']);


        // tags module
        $router->get('tags',  ['uses' => 'TagController@index']);
        $router->post('tags',  ['uses' => 'TagController@store']);
    }
);
