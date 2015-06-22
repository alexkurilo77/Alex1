<?php
session_start();
require_once 'logic/functions.php';
require_once 'logic/initialize.php';


$request_uri = $_SERVER['REQUEST_URI'];
preg_match_all('#/(\w*)#', $request_uri, $path);
$path = $path[1];

$routes = array(
	'' 			=> 'home',
	'home' 		=> 'home',
	'login' 	=> 'login',
	'logout'	=> 'logout',
	'register'	=> 'register',
	'not_found'	=> '404',
);

if (in_array($path[0], $routes) || $path[0] === ''){
	route($routes[$path[0]]);
} else {
	route($routes['not_found']);
}