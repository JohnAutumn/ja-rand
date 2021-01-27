<?php

namespace rand\abstracts;

abstract class rand {
	protected $arguments_defaults = array();
	protected $arguments = array();

	public function __construct($args = array()) {
		$this->init_defaults();
		$this->init_arguments($args);
	}

	protected abstract function init_defaults();
	protected abstract function init_arguments($args = array());
	public abstract function get();
}