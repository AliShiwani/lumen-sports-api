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
$router->get('test', 'ApiController@index');
$router->get('get/allEntities', 'ApiController@fetchEntity');
$router->get('get/allEntitiesBySportId/{sportId}', 'ApiController@fetchEntityBySportId');
$router->get('get/allEntitiesByCondition/{sportId}/{zip}', 'ApiController@fetchEntityByCondition');
$router->get('get/fetchTeamByEntityId/{entityId}', 'ApiController@fetchTeamByEntityId');

