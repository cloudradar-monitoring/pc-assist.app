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

use App\Helper\Markdown;
use App\Http\Controllers\PairingController;

$router->get('/', function () {
    return view('index', []);
});

$router->get('/help', function () {
    return view('help', []);
});

$router->get('/about', function () {
    return view('about', ['readme'=> Markdown::renderFile('README')]);

});

$router->get('pairing/{code:[0-9a-z]{6}}', 'PairingController@show');
$router->post('pairing/', [
    'uses'       => 'PairingController@store',
    'middleware' => 'rateLimit',
]);
