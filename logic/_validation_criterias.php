<?php
$Vpresence = function(&$dict, $fields, &$messages){
	foreach ($fields as $field) {
		if (!isset($dict[$field]) || empty($dict[$field])){
			$dict[$field] = Null;
			$messages[] = "Field '{$field}' not in request or empty";
		}
	}
};

$Vemail = function($email, &$messages){
	$email = trim($email);
	if(!strlen($email)){
		$messages[] = "Email can't be blank";
	} elseif (!preg_match('/^.+@.+(\..+)+$/', $email)){
		$messages[] = "{$email} doesn't looks like email";
	}
};

$Vpassword = function($password, $len,  &$messages){
	if(strlen($password) < $len){
		$messages[] = "Password length should be at least {$len} symbols";
	}
};

$Vconfirm = function($a, $b, $field, &$messages){
	if ($a !== $b){
		$messages[] = "{$field} differs from its confirmation";
	}
};