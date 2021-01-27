<?php

namespace rand;

use rand\types;

class rand {
	private $generators = array();

	public function __construct(){
		$this->init_generators();
		$this->includes();
	}

	private function init_generators(){
		$this->generators = array(
			'ip',
			'date',
			'user_agent',
		);
	}

	private function includes(){
		$dir = dirname(rtrim( __FILE__, '/\\' )). '/';
		foreach (array_merge(array('abstract.rand'), $this->generators) as $file){
			require_once $dir . sprintf('%s.php', $file);
		}
	}

	/**
	 * @param string $name
	 * @param array $args
	 *
	 * @return false|\rand\abstracts\rand
	 */
	public function generator($name, $args = array()){
		if(!in_array($name, $this->generators)){
			trigger_error(sprintf('Generator %s does not exist', $name));
			return false;
		}
		$classname = 'rand\types\\' . $name;
		return new $classname($args);
	}
}