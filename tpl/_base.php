<?php 
global $templates;
$action = "";
$method = "GET";
$form_parts = array();
$submit = 'Submit';
$flash = array();
$form_classes = array('col-md-4', 'col-md-offset-4');
include get_tpl('_header');

include get_tpl('_body');

include get_tpl('_footer');