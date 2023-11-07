<?php
/**
 * Mapping Routes
 *
 * @see https://altorouter.com/usage/mapping-routes.html
 */

$router = Epack\Router::getInstance();

/*----------  Route Definitions  ----------*/

$router->map( 'GET', '/', 'App\Controllers\Home#index', 'home');

/*----------  Processing Requests  ----------*/

\Epack\Router::dispatch( function() {
	$error = new App\Controllers\Error();
	$error->index();
} );
