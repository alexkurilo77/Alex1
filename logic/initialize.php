<?php
$db = array(
	'host' => 'localhost',
	'user' => 'root',
	'pass' => 'root',
	'db'   => 'slabel_blog'
	);

$g = $_GET;
$p = $_POST;
$s = &$_SESSION;

$titles = array('Slabel');
$templates = array();

if(!isset($s['user'])) $s['user'] = Null;

if(!isset($s['flash'])) {
	$s['flash'] = array(
		'warning' 	=> array(),
		'info'		=> array(),
		'success'	=> array(),
		'danger'	=> array()
	);
}

define('TPL_DIR', 'tpl/');
define('CONTROLLER_DIR', 'controller/');
define('MODEL_DIR', 'model/');

$request_uri = $_SERVER['REQUEST_URI'];
preg_match_all('#/(\w*)#', $request_uri, $path);
$path = $path[1];


 ?>