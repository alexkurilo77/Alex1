<?php 
$db = array(
	'host' => 'localhost',
	'user' => 'root',
	'pass' => '',
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

define('TPL_DIR', 'tpl/');
define('CONTROLLER_DIR', 'controller/');

function initialize_db($conn){
	global $db;
	mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS {$db['db']}");
}

function initialize_tables($conn){
	global $db;
	mysqli_query($conn,
		"CREATE TABLE IF NOT EXISTS users(
			id INT PRIMARY KEY AUTO_INCREMENT,
			name VARCHAR(20),
			password VARCHAR(40),
			email VARCHAR(40),
			email_hash VARCHAR(40)
		)");
	mysqli_query($conn,
		"CREATE TABLE IF NOT EXISTS posts(
			id INT PRIMARY KEY AUTO_INCREMENT,
			title VARCHAR(20),
			content TEXT,
			user_id INT
		)");
	mysqli_query($conn,
		"CREATE TABLE IF NOT EXISTS comments(
			id INT PRIMARY KEY AUTO_INCREMENT,
			content TEXT,
			user_id INT,
			post_id INT
		)");
	mysqli_query($conn,
		"CREATE TABLE IF NOT EXISTS folowing(
			hunter_id INT,
			target_id INT
		)");
}

 ?>