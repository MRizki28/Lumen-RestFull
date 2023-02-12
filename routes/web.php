<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\API\MahasiswaController;
use Illuminate\Support\Facades\Route;

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

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });


// $router->get('/key', function() {
//     return \Illuminate\Support\Str::random(32);
// });

$router->get('/mahasiswa', 'API\MahasiswaController@index');
$router->post('/mahasiswa', 'API\MahasiswaController@store');

