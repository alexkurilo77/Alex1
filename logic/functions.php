<?php

function route($name){
	global $templates, $conn, $g, $p, $s;
	include CONTROLLER_DIR."{$name}.php";
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