<?php
namespace Plugin\Hooks;

use Plugin\Lpress\Loader;

class Hook
{
	
	protected $loader;

	function __construct()

	{

		$this->loader = new Loader($this);

	}

	public function run() {

		$this->boot();
		$this->loader->run();
		
	}
}