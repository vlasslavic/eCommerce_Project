<?php
namespace app\controllers;

class Profile extends \app\core\Controller{
	
#[\app\filters\Profile]    
public function myStore(){

}

public function settings(){
			$profile = new \app\models\Profile();
            $user = new \app\models\User();
            if(isset($_SESSION["profile_id"])){
			    $data = $profile->get($_SESSION["profile_id"]);
            }
			
		if(isset($_POST['action'])){

				$profile->user_id = $_SESSION["user_id"];
				$profile->first_name = $_POST['first_name'];
				$profile->middle_name = $_POST['middle_name'];
				$profile->last_name = $_POST['last_name'];
				$profile->profile_id = $_POST['profile_id'];

			if($profile->profile_id==""){
				$profile->insert(); 
				header('location:'.URLROOT.'/Profile');
			}else{
				$profile->update(); 
				header('location:'.URLROOT.'/Profile');}

			
				
			
		
		}else{
		$this->view('Profile/settings',$data);}
	}



}