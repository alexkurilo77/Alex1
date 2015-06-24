<?php
$templates[] = '_blog';
if(isset($is_my_blog)){
	$templates[] = '_add_post_form';
}


include get_tpl('_base');