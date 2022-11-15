<?php
namespace app\filters;

#[\Attribute]
class Login extends \app\core\AccessFilter{

	public function execute(){
		if(!isset($_SESSION['email'])){
			header('location:'.URLROOT.'/User/index?error=You must log in to use these features!');
			return true;
		}
		return false;
	}

}