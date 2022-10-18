<?php
namespace app\models;

class Counter{
	private static $file = 'app/resources/counter.txt';
	public $name;

    public function __toString(){
		return $this->name;
	}

}

