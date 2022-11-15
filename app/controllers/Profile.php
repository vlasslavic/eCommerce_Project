<?php
namespace app\controllers;

class Profile extends \app\core\Controller{
	
#[\app\filters\Profile]    
public function myStore(){
		$this->view('/Profile/myStore');
	
}

#[\app\filters\Login]    
public function settings(){
		$profile = new \app\models\Profile();
		
		if(isset($_POST['action'])){
				$profile->seller_id = $_SESSION['seller_id'];
				$profile->business_name = $_POST['business_name'];
				$profile->description = $_POST['description'];
				if(isset($_FILES['picture'])){
					$filename = $this->saveFile($_FILES['picture']);
					$profile->picture = $filename;
				}
					

				$profile->phone = $_POST['phone'];
				$profile->email = $_POST['business_email'];
				$profile->address = $_POST['address'];

			if(!isset($_SESSION['profile_id'])){
				$profile->insert();
				$profile=$profile->get($_SESSION['seller_id']);
				$_SESSION['profile_id'] = $profile->profile_id;
				header('location:'.URLROOT.'Profile/settings');
			}else{
				$profile->update(); 
				header('location:'.URLROOT.'Profile/settings?message=Your profile has been updated!');
				
			}
		}elseif(isset($_SESSION["profile_id"])){
            $data = $profile->get($_SESSION["seller_id"]);
            $this->view('Profile/settings',$data);
			
        }else{
		    $this->view('Profile/settings');}
	}

	// Tongles the profile visibility for clients
	public function visibilityProfile(){
		$profileD = new \app\models\Profile();
		$profileD = $profileD->getProfile($_SESSION['profile_id']);
		if($profileD->isEnabled){
			$profileD->isEnabled = FALSE;
			$profileD->changeVisibility();
			header('location:'.URLROOT.'Profile/settings?info=Your profile has been disabled!');
		}else{
			$profileD->isEnabled = TRUE;
			$profileD->changeVisibility();
			header('location:'.URLROOT.'Profile/settings?message=Your profile has been enabled!');
	}
	}

	public function changePassword(){ 
		$profile = new \app\models\Profile();
			$data = $profile->get($_SESSION["user_id"]);
			

		if(isset($_POST['action'])){

				$profile->user_id = $_SESSION["user_id"];
				$profile->first_name = $_POST['first_name'];


			if($profile->profile_id==""){
				$profile->insert(); 
				header('location:'.URLROOT.'Profile/changePassword');
			}else{
				$profile->update(); 
				header('location:'.URLROOT.'Profile/changePassword');}

			
				
			
		
		}else{
		 $this->view('Profile/changePassword');}
	}

	public function logout(){
		session_destroy();
		header('location:'.URLROOT.'User/index?message=You\'ve been successfully logged out.');
	}


}