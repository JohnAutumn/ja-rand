<?php

namespace rand\types;

class ip extends \rand\abstracts\rand {
	protected function init_defaults() {
		$this->arguments_defaults = array();
	}

	protected function init_arguments($args = array()){
		$this->arguments = array();
	}

	public function get() {
		return sprintf('%d.%d.%d.%d', mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
	}
}