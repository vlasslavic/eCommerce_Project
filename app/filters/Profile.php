<?php
namespace app\filters;

#[\Attribute]
class Profile extends \app\core\AccessFilter{

	public function execute(){
		$profile= new \app\models\Profile();
		$profile=$profile->get($_SESSION['seller_id']);
		if($profile->seller_id!=$_SESSION['seller_id']){
			header('location:'.URLROOT.'Profile/settings?message=You must create your profile in order to use this feature!');
			return true;
		}
		return false;
	}

}