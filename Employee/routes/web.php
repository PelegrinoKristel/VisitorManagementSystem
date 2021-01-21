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

// unsecure routes
$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/users',['uses' => 'EmployeeController@getUsers']);
});

$router->get('/users','EmployeeController@index');
$router->post('/users','EmployeeController@add');
$router->get('/users/{id}','EmployeeController@search');
$router->put('/users/{id}','EmployeeController@update');
$router->delete('/users/{id}','EmployeeController@delete');