<?php

namespace rand\types;

class date extends \rand\abstracts\rand {
	protected function init_defaults() {
		$this->arguments_defaults = array(
			'format' => 'Y.m.d',
			'start_time' => 0
		);
		$this->arguments_defaults['end_time'] = self::get_rand_time($this->arguments_defaults['start_time'], time());
	}

	protected function init_arguments($args = array()) {
		$this->arguments = array_merge($this->arguments_defaults, $args);
	}

	public static function get_rand_time($start_time, $end_time){
		//Обёртка на будущее, ибо функционал будет улучшаться
		return mt_rand($start_time, $end_time);
	}

	public function get(){
		$time = self::get_rand_time($this->arguments['start_time'], $this->arguments['end_time']);
		return date($this->arguments['format'], $time);
	}
}