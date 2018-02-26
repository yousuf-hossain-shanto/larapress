<?php
namespace Plugin\Http;

use Illuminate\Database\Capsule\Manager as DB;

class Kernel
{
	
	function __construct()
	{
		
		$this->load_hooks();
		$this->load_database();

	}

	private function load_database()

	{

		global $wpdb;
		global $table_prefix;
		$capsule = new DB;

		$capsule->addConnection([
		    'driver'    => 'mysql',
		    'host'      => DB_HOST,
		    'database'  => DB_NAME,
		    'username'  => DB_USER,
		    'password'  => DB_PASSWORD,
		    'charset'   => DB_CHARSET,
		    'collation' => $wpdb->collate,
		    'prefix'    => $table_prefix,
		]);

		$capsule->setAsGlobal();

		$capsule->bootEloquent();

	}

	private function load_hooks()

	{

		global $hooks;

		foreach ($hooks as $hook) {
			
			$class = 'Plugin\Hooks\\' . $hook;

			$object = new $class();

			$object->run();

		}

	}
}