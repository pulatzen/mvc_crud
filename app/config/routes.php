<?php

$router->get('/', 'LoginController@index');
$router->post('/login', 'LoginController@login');

$router->get('/users', 'UserController@show');

$router->get('/register', 'RegisterController@index');
$router->post('/register', 'RegisterController@register');

$router->get('/edit', 'EditController@index');
$router->post('/edit', 'EditController@edit');

$router->get('/delete', 'DeleteController@index');

$router->get('/create', 'CreateController@index');
$router->post('/create', 'CreateController@create');
