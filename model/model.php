<?php

$conn = mysqli_connect($db['host'], $db['user'], $db['pass']);
if ($conn){
  initialize_db($conn, $db['db']);
  $is_db = mysqli_select_db($conn, $db['db']);
  initialize_tables($conn);
}

function initialize_db($conn, $name){
  mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS {$name}");
}

function initialize_tables($conn){
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
      to_type VARCHAR(20),
      rel_type VARCHAR(20) DEFAULT 'have'
    )");
}

$model = array();
$model_files = array_filter(scandir(MODEL_DIR), function($i){
	return !in_array($i, array('.','..','model.php'));
});
foreach ($model_files as $model_file) {
	require_once $model_file;
}

unset($conn);
