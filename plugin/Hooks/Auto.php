<?php
namespace Plugin\Hooks;

class Auto extends Hook
{
	
	function boot()
	{

		//$this->loader->add_filter('the_title', 'title');

	}

	function title($title)

	{

		return view('title', array(), true);

	}
}