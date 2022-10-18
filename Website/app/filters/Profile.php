<?php
namespace app\filters;

#[\Attribute]
class Profile extends \app\core\AccessFilter{

	public function execute(){
		$profile= new \app\models\Profile();
		$profile=$profile->get($_SESSION['user_id']);
		if($profile->user_id!=$_SESSION['user_id']){
			header('location:'.URLROOT.'Account/settings?error=You must create your profile in order to use this feature!.');
			return true;
		}
		return false;
	}

}