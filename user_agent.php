<?php

namespace rand\types;

class user_agent extends \rand\abstracts\rand {
	private static $agents = null;

	protected function init_defaults() {
		/*$this->arguments_defaults = array(
			'os' => '',
			'browser' => '',
			'version' => '',
			'locale' => ''
		);*/
		$this->arguments_defaults = array();
	}
	protected function init_arguments( $args = array() ) {
		$this->arguments = array();
	}
	private function get_json(){
		$dir = dirname(rtrim( __FILE__, '/\\' )). '/';
		return json_decode(file_get_contents($dir . 'src/user_agents/agents.json'));
	}
	private function maybe_init_agents(){
		if(self::$agents === null){
			self::$agents = $this->get_json();
		}
	}

	public function get() {
		$this->maybe_init_agents();
		return self::$agents[array_rand(self::$agents)];
	}
}