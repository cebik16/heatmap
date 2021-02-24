<?php

/** @var Router $router */

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

use Laravel\Lumen\Routing\Router;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('links', ['uses' => 'LinkController@list']);
    $router->post('links', ['uses' => 'LinkController@create']);
    $router->delete('links/{id}', ['uses' => 'LinkController@delete']);
    $router->get('links/by-url-in-interval', ['uses' => 'LinkController@findByUrlInInterval']);
    $router->get('links/by-type-in-interval', ['uses' => 'LinkController@findByTypeInInterval']);
    $router->get('links/customer-itinerary', ['uses' => 'LinkController@getCustomerItinerary']);
});
