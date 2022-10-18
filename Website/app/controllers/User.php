<?php
namespace app\controllers;

class User extends \app\core\Controller{
	
	//log users in here
	public function index(){
		if(isset($_POST['action'])){
			//select the user record as per the request
			$user = new \app\models\User();
			$user = $user->get($_POST['username']);
			$profile = new \app\models\Profile();
			$profile = $profile->get($user->user_id);
			// $posts == new \app\models\Post();
			// $posts = $profile->get($profile_id->profile_id);
			//verify the password match
			if(password_verify($_POST['password'], $user->password_hash)){
				//correct password provided
				$_SESSION['username'] = $user->username;
				$_SESSION['user_id'] = $user->user_id;
				$_SESSION['profile_id'] = $profile->profile_id;
				$_SESSION['profile'] = $profile;
				// $_SESSION['posts'] = $posts;
				
				header('location:'.URLROOT.'Main');
			}else{
				//incorret password provided
				header('location:'.URLROOT.'User/index?error=Incorrect username/password combination!');
			}
		}else{
			$this->view('User/index');
		}
	}


	public function profile(){
		$this->view('/Account/index');
	}

	//GOAL #[Attribute] to provide authentication service
	#[\app\filters\Login]
	public function account(){
		if(isset($_POST['action'])){
			//we submit the password modification form
			$user = new \app\models\User();
			$user = $user->get($_SESSION['username']);
			if(password_verify($_POST['old_password'],$user->password_hash)){
				//old password matches
				if($_POST['password'] == $_POST['password_confirm']){
					//good!
					$user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
					$user->updatePassword();
					header('location: '.URLROOT.'User/account?message=Password modified.');

				}else{
					header('location:'.URLROOT.'User/account?error=New passwords don\'t match. Password unchanged.');	
				}
			}else{
				header('location:'.URLROOT.'User/account?error=Wrong password provided. Password unchanged.');
			}


		}else
			$this->view('/User/account');
	}

	public function logout(){
		session_destroy();
		header('location:'.URLROOT.'Main/index?message=You\'ve been successfully logged out.');
	}

	//process of requesting the username and password wanted by the user
	public function register(){
		//when we submit the form
		if(isset($_POST['action'])){
			//verify that the password and password_confirmation match
			if($_POST['password'] == $_POST['password_confirmation']){
				//TODO: validation later
				//proceed with attempting registration

				$user = new \app\models\User();//TODO

				if($user->get($_POST['username'])){
					//redirect with an error message
					header('location:/User/register?error=The username "'.$_POST['username'].'" already exists. Choose another.');
				}else{
					$user->username = $_POST['username'];
					$user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

					$user->insert();//maybe this is where we will have some error checking

					header('location:'.URLROOT.'User/index?message=Success and Welcome, now you can log in.');
				}
			}
		}else{
			//show the registration form
			$this->view('User/register');
		}
	}

	#[\app\filters\Login]
	public function updatePassword(){
		$profile = new \app\models\Profile();
			$data = $profile->get($_SESSION["user_id"]);
		if(isset($_POST['action'])){

			$user = new \app\models\User();
			$user = $user->get($_SESSION['username']);

			if(password_verify($_POST['current_password'], $user->password_hash)){
					$user->password_hash = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
					$user->updatePassword();//maybe this is where we will have some error checking

					header('location:'.URLROOT.'Account/settings?message=Success, password changed.');
				
			}else{
				header('location:'.URLROOT.'User/updatePassword?error=Current password is incorrect.');
			}
		
		}else{
			//show the registration form
			$this->view('User/updatePassword');
		}
	}

}