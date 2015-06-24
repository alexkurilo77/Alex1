<?php

$titles[] = 'User';

switch(True){
  case (!isset($path[1])):
    not_found();
    break;
  default:
    $user = $model['user']['by_name']($path[1]);
    $user = $user ? $user : not_found();
}

$titles[] = $user['name'];


include get_tpl('user');