<?php

$titles[] = 'All blogs';


$posts = $model['post']['all']();

include get_tpl('blogs');