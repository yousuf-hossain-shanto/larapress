<?php

if (! function_exists('view')) {

	function view( $view, $data = array(), $return = false )

	{

		global $view_config;

		$compilar = new Plugin\Lpress\View($view_config['path'], $view_config['cache']);

		if ($return) {
			return $compilar->view()->make($view, $data)->render();
		} else {
			echo $compilar->view()->make($view, $data)->render();
		}

		return;

	}
}