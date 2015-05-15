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

Route::get('/', 'WelcomeController@index');

$router->group(['prefix' => '/api/v1', 'before' => 'oauth2',], function($router) {
    $router->resource('users',                  'UserController');
    $router->resource('posts',                  'PostController');
    $router->resource('news',                   'NewsController');
    $router->resource('comments',               'CommentController');
    $router->resource('question-type',          'QuestionTypeController');
    $router->resource('question',               'QuestionController');
    $router->resource('question.answer',        'QuestionAnswerController');
});

Route::post('oauth/access_token', function() {
    return Authorizer::issueAccessToken();
});