<?php

$titles[] = 'Blog';

if($p){
	$error_messages = validate('post', $p);
	if($error_messages){
		foreach ($error_messages as $msg) {
			add_flash('danger', $msg);
		}
	} else {
		$model['post']['create']($p);
		go_here($path);
	}
}
$posts = $model['post']['my_stream']();

switch(True){
  case (!isset($path[1])):
    $posts = $model['post']['my_stream']();
    $titles[] = 'My stream';
    break;
  case ($path[1] === $s['user']['id']):
    $is_my_blog = True;
    $titles[] = 'My blog';
  default:
    $posts = $model['post']['by_user']($path[1]);
}


include get_tpl('blog');