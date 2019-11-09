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

$router->get('/', function () {
    return response()->json(
        ['message' => 'Survey API', 'status' => 'Connected']
    );
});

$router->get('/pools', 'PoolsController@index');
$router->post('/pools', 'PoolsController@store');
$router->get('/pools/{id}', 'PoolsController@show');
$router->get('/pools/{id}/stats', 'PoolsController@stats');
$router->post('/pools/{id}/vote', 'PoolsController@vote');
