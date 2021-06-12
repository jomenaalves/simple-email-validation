<?php
require __DIR__ . "/../vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router("http://localhost/validacao-email/");

/**
 * routes
 * The controller must be in the namespace Test\Controller
 * this produces routes for route, route/$id, route/{$id}/profile, etc.
 */


// set namespace of controller
$router->namespace("Source\App");

// router prefix
$router->group(null);

/**
 *All routers of the system
 */

 
    $router->get('/login', 'LoginController:index');
    $router->get('/cad', 'CadController:index');

    //apis
    $router->post('/api/register/{username}/{email}/{password}',"ApiController:register");
    $router->post('/api/verifyRandAndMakeCadaster/{rand}/{username}/{email}/{passwd}', "ApiController:verifyRandAndMakeCadaster");


/**
 * This method executes the routes
 */
$router->dispatch();
