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

        // articles
        $router->get('articles',  ['uses' => 'ArticleController@index']);
        $router->post('articles',  ['uses' => 'ArticleController@store']);
        $router->get('articles/{id}',  ['uses' => 'ArticleController@show']);
        $router->patch('articles/{id}',  ['uses' => 'ArticleController@update']);
        $router->delete('articles/{id}',  ['uses' => 'ArticleController@destroy']);
        // tags module
        $router->get('tags',  ['uses' => 'TagController@index']);
        $router->post('tags',  ['uses' => 'TagController@store']);
        $router->get('tags/{id}',  ['uses' => 'TagController@show']);
        $router->patch('tags/{id}',  ['uses' => 'TagController@update']);
        $router->delete('tags/{id}',  ['uses' => 'TagController@destroy']);

        // comments module
        $router->get('comments',  ['uses' => 'CommentController@index']);
        $router->post('comments',  ['uses' => 'CommentController@store']);
        $router->get('comments/{id}',  ['uses' => 'CommentController@show']);
        $router->patch('comments/{id}',  ['uses' => 'CommentController@update']);
        $router->delete('comments/{id}',  ['uses' => 'CommentController@destroy']);
    }
);
