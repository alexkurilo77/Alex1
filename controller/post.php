<?php

$titles[] = 'Post';

switch(True){
  case (!isset($path[1])):
    not_found();
    break;
  default:
    $post = $model['post']['by_id']($path[1]);
    $post = $post ? $post[0] : not_found();
}

$titles[] = $post['title'];

include get_tpl('post');