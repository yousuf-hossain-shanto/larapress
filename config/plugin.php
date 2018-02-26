<?php

global $hooks;
global $view_config;

$hooks = array(
	'Auto'
);

$view_config = array(
	'path' => plugin_dir_path(__FILE__) . '../resources/views',
	'cache' => plugin_dir_path(__FILE__) . '../storage/framework/views'
);