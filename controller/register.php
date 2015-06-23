<?php
if ($s['user']) {
	add_flash('warning', "You can't create new users during the session");
	go_home();
}
if($p){
	$error_messages = validate('register', $p);
	if($error_messages){
		foreach ($error_messages as $msg) {
			add_flash('danger', $msg);
		}
	} else {
		save_user($p);
		login_user($p['name'], $p['password']);
	}
}

include get_tpl('register');