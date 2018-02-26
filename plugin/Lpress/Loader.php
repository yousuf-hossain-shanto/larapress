<?php
namespace Plugin\Lpress;

class Loader
{
	
	protected $actions;
	protected $filters;
	protected $hook;

	public function __construct($hook) {

		$this->actions = array();
		$this->filters = array();
		$this->hook = $hook;

	}

	public function add_action( $hook, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->actions = $this->add( $this->actions, $hook, $callback, $priority, $accepted_args );
	}

	public function add_filter( $hook, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->filters = $this->add( $this->filters, $hook, $callback, $priority, $accepted_args );
	}

	private function add( $hooks, $hook, $callback, $priority, $accepted_args ) {

		$hooks[] = array(
			'hook'          => $hook,
			'callback'      => $callback,
			'priority'      => $priority,
			'accepted_args' => $accepted_args
		);

		return $hooks;

	}

	public function run() {

		foreach ( $this->filters as $hook ) {

			add_filter( $hook['hook'], array( $this->hook, $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );

		}

		foreach ( $this->actions as $hook ) {

			add_action( $hook['hook'], array( $this->hook, $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );

		}

	}
}