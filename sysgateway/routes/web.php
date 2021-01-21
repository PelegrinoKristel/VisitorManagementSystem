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

$router->group(['middleware' => 'client.credentials'], function() use ($router){

$router->get('/admin','AdminController@index');
$router->get('/admin/{id}', 'AdminController@show');
$router->put('/admin/{id}','AdminController@update');
$router->delete('/admin/{id}', 'AdminController@delete');

$router->get('/customer','CustomerController@index');
$router->get('/customer/{id}', 'CustomerController@show');
$router->put('/customer/{id}','CustomerController@update');
$router->delete('/customer/{id}', 'CustomerController@delete');

$router->get('/employee','EmployeeController@index');
$router->get('/employee/{id}', 'EmployeeController@show');
$router->put('/employee/{id}','EmployeeController@update');
$router->delete('/employee/{id}', 'EmployeeController@delete');

$router->get('/adminjob','AdminJobController@index');
$router->get('/adminjob/{id}','AdminJobController@show');

});