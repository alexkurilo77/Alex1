<?php
$db = array(
	'host' => 'localhost',
	'user' => 'root',
	'pass' => 'root',
	'db'   => 'slabel_blog'
	);

$conn = mysqli_connect($db['host'], $db['user'], $db['pass']);
if ($conn){
	initialize_db($conn);
	$is_db = mysqli_select_db($conn, $db['db']);
	initialize_tables($conn);
}

$g = $_GET;
$p = $_POST;
$s = &$_SESSION;

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

$request_uri = $_SERVER['REQUEST_URI'];
preg_match_all('#/(\w*)#', $request_uri, $path);
$path = $path[1];



function initialize_db($conn){
	global $db;
	mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS {$db['db']}");
}

function initialize_tables($conn){
	global $db;
	mysqli_query($conn,
		"CREATE TABLE IF NOT EXISTS users(
			id INT PRIMARY KEY AUTO_INCREMENT,
			name VARCHAR(20) UNIQUE,
			password VARCHAR(40),
			email VARCHAR(40),
			email_hash VARCHAR(40)
		)");
	mysqli_query($conn,
		"CREATE TABLE IF NOT EXISTS posts(
			id INT PRIMARY KEY AUTO_INCREMENT,
			title VARCHAR(20),
			content TEXT
		)");
	mysqli_query($conn,
		"CREATE TABLE IF NOT EXISTS comments(
			id INT PRIMARY KEY AUTO_INCREMENT,
			content TEXT
		)");
	mysqli_query($conn,
		"CREATE TABLE IF NOT EXISTS com(
			from_id INT,
			from_type VARCHAR(20),
			to_id INT,
			to_type VARCHAR(20)
		)");
}

 ?>