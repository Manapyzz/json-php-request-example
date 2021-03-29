<?php

require_once __DIR__.'/../vendor/autoload.php';

use Bramus\Router\Router;

$router = new Router();

$router->get('/accounts', '\App\Controller\AccountController@getAll');
$router->get('/homepage', '\App\Controller\HomeController@homepage');
$router->get('/account/{id}', '\App\Controller\AccountController@get');
$router->post('/account/create', '\App\Controller\AccountController@create');

$router->get('/search/account', '\App\Controller\HomeController@searchAccount');

//$router->get('/search/account/{accountNumber}', '\App\Controller\AccountController@search');

$router->run();