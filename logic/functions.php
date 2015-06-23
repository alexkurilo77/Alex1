<?php

function route($name){
	global $templates, $conn, $g, $p, $s;
	include CONTROLLER_DIR."{$name}.php";
}

function go_home(){
	header('Location: /home');
	exit();
}

function not_found(){
	header('Location: /not_found');
	exit();
}

function get_tpl($tpl, $variables=null){
	$template = getcwd().'/'.TPL_DIR.$tpl.".php";
	if ($variables){
		extract($variables);
		include $template;
	} else {
		return $template;
	}
}

function display_flashes(&$flash){
	foreach ($flash as $k => $v) {
		if ($v) {
			get_tpl('_flash', array('status'=>$k, 'messages'=>$v));
			$flash[$k] = array();
		}
	}
}

function add_flash($status, $message){
	global $s;
	$s['flash'][$status][] = $message;
}

function validate($type, $p){
	global $validators;
	$validation_result = $validators[$type]($p);
	return $validation_result;
}

function save_user($user){
	global $conn;
	$name = $user['name'];
	$password = md5($user['password']);
	$email = strtolower($user['email']);
	$email_hash = md5($email);
	mysqli_query($conn, "
		INSERT INTO users(name, password, email, email_hash) VALUES('{$name}', '{$password}', '{$email}', '{$email_hash}')");
	add_flash('success', "User created");
}

function login_user($name, $password){
	global $conn, $s;
	$password = md5($password);
	$result = mysqli_query($conn, "
		SELECT * FROM users WHERE name='{$name}' AND password='{$password}'");
	if($user = mysqli_fetch_assoc($result)){
		$s['user'] = $user;
		add_flash('info', "You're now logged in");
		go_home();
	} else {
		add_flash('danger', "Wrong credentials");
	}
}