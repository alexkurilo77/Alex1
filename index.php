<?php

session_start();
require_once 'logic/validators.php';
require_once 'logic/functions.php';
require_once 'logic/initialize.php';
require_once 'model/model.php';

$routes = array(
	'' 			=> 'home',
	'home' 		=> 'home',
	'login' 	=> 'login',
	'logout'	=> 'logout',
	'register'	=> 'register',
	'blog'		=> 'blog',
	'blogs'		=> 'blogs',
	'post'		=> 'post',
	'user'		=> 'user',
	'not_found'	=> '404',
);

if (in_array($path[0], $routes) || $path[0] === ''){
	route($routes[$path[0]]);
} else {
	route($routes['not_found']);
}
