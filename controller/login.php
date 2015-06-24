<?php

$titles[] = 'Login';

if ($s['user']) {
	add_flash('warning', "You are already logged in");
	go_home();
}
if($p){
	$error_messages = validate('login', $p);
	if($error_messages){
		foreach ($error_messages as $msg) {
			add_flash('danger', $msg);
		}
	} else {
		login_user($p['name'], $p['password']);
	}
}

include get_tpl('login');