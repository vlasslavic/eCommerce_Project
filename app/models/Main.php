<?php
namespace app\models;

class Main{
    private $menuState;

    public function setMenuState($x){
		$this->menuState=$x;
	}

    public function getMenuState(){
		return $this->menuState;
	}
}