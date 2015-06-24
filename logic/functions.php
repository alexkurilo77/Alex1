<?php

function route($name){
	global $templates, $titles, $model, $path, $g, $p, $s;
	include CONTROLLER_DIR."{$name}.php";
}

function go_home(){
	header('Location: /home');
	exit();
}

function go_here($path){
	$addr = implode('/', $path);
	header("Location: /{$addr}");
	exit();
}

function not_found(){
	header('Location: /not_found');
	exit();
}

function arr_get($array, $key, $default = null){
    return isset($array[$key]) ? $array[$key] : $default;
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

function login_user($name, $password){
	global $model, $s;
	$password = md5($password);
	$result = $model['user']['login']($name, $password);
	if($result){
		$user = mysqli_fetch_assoc($result);
		$s['user'] = $user;
		add_flash('info', "You're now logged in");
		go_home();
	} else {
		add_flash('danger', "Wrong credentials");
	}
}