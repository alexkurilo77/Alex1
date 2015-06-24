<?php

function _create_validators(){
	$validators = array();

	require_once "_validation_criterias.php";

	$validators['register'] = function(&$p) use ($Vpresence, $Vemail, $Vpassword, $Vconfirm){
		$messages = array();
		$Vpresence($p, array('name', 'email', 'confirmation', 'password'), $messages);
		$Vemail($p['email'], $messages);
		$Vpassword($p['password'], 4, $messages);
		$Vconfirm($p['password'], $p['confirmation'], 'Password', $messages);
		return $messages;
	};

	$validators['login'] = function(&$p) use ($Vpresence){
		$messages = array();
		$Vpresence($p, array('name', 'password'), $messages);
		return $messages;
	};

	$validators['post'] = function(&$p) use ($Vpresence){
		$messages = array();
		$Vpresence($p, array('title', 'content'), $messages);
		return $messages;
	};

	return $validators;
}


$validators = _create_validators();