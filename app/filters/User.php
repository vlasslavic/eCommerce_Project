<?php
namespace app\filters;

#[\Attribute]
class User extends \app\core\AccessFilter{

	public function execute(){
		$user= new \app\models\User();
		$user=$user->getUser($_SESSION['email']);
		if($user->email!=$_SESSION['email']){
			header('location:'.URLROOT.'User/registerCustomer?message=You must create your profile in order to use this feature!');
			return true;
		}
		return false;
	}

}