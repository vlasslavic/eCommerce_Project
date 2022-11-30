<?php
namespace app\controllers;

class User extends \app\core\Controller{
	
	//log users in here
	public function index(){
		if(isset($_POST['action'])){
			//select the user record as per the request
			$user = new \app\models\User();
			$user = $user->getUser($_POST['email']);

			//check user type
			if(isset($user->user_id)){
				if(password_verify($_POST['password'], $user->password_hash)){
					//correct password provided
					$_SESSION['email'] = $user->email;
					$_SESSION['user_id'] = $user->user_id;
					$_SESSION['picture'] = $user->picture;
					// $_SESSION['posts'] = $posts;
					
					header('location:'.URLROOT.'Main');
				}else{
					//incorret password provided
					header('location:'.URLROOT.'User/index?error=Incorrect username/password combination!');
				}
			}else if(isset($user->seller_id)){
				$user = new \app\models\User();
				$user = $user->getSeller($_POST['email']);
				$profile = new \app\models\Profile();
				$profile = $profile->get($user->seller_id);

				if(isset($user->seller_id)){
					if(password_verify($_POST['password'], $user->password_hash)){
						//correct password provided
						$_SESSION['email'] = $user->email;
						$_SESSION['seller_id'] = $user->seller_id;
						//Check if profile is created
						if(isset($profile->profile_id)){
							$_SESSION['profile_id'] = $profile->profile_id;
							$_SESSION['profile_pic'] = $profile->picture;
						}

						// $_SESSION['posts'] = $posts;
						
						header('location:'.URLROOT.'Main');
					}else{
						//incorret password provided
						header('location:'.URLROOT.'User/index?error=Incorrect username/password combination!');
					}
				}
			}else{
				header('location:'.URLROOT.'User/index?error=Incorrect username/password combination!');
			}

			//verify the password match
		
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
		header('location:'.URLROOT.'User/index?message=You\'ve been successfully logged out.');
	}

	//process of requesting the username and password wanted by the user
	public function register(){
		//when we submit the form
			//show the registration form
			$this->view('User/register');
	}

	public function registerSeller(){
		//when we submit the form
		if(isset($_POST['action'])){
			//verify that the password and password_confirmation match
			if($_POST['password'] == $_POST['password_confirmation']){
				//TODO: validation later
				//proceed with attempting registration

				$user = new \app\models\User();//TODO

				if($user->getUser($_POST['email']) Or $user->getSeller($_POST['email'])){
					//redirect with an error message
					header('location:/User/registerSeller?error=The username "'.$_POST['email'].'" already exists. Choose another.');
				}else{
					$user->email = $_POST['email'];
					$user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

					$user->insertSeller();//maybe this is where we will have some error checking

					header('location:'.URLROOT.'User/index?message=Success and Welcome, now you can log into your Seller account.');
				}
			}
		}else{
			//show the registration form
			$this->view('User/registerSeller');
		}
	}

	public function registerCustomer(){
		//when we submit the form
		if(isset($_POST['action'])){
			//verify that the password and password_confirmation match
			if($_POST['password'] == $_POST['password_confirmation']){
				//TODO: validation later
				//proceed with attempting registration

				$newUser = new \app\models\User();//TODO

				if($newUser->getUser($_POST['email']) Or $newUser->getSeller($_POST['email'])){
					//redirect with an error message
					header('location:/User/registerCustomer?error=The username "'.$_POST['email'].'" already exists. Choose another.');
				}else{
					$newUser->email = $_POST['email'];
					$newUser->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
					$newUser->first_name = $_POST['first_name'];
					$newUser->last_name = $_POST['last_name'];
					$newUser->address = $_POST['address'];
					$newUser->insertUser();//maybe this is where we will have some error checking

					header('location:'.URLROOT.'User/index?message=Success and Welcome, now you can log into your Customer account.');
				}
			}
		}else{
			//show the registration form
			$this->view('User/registerCustomer');
		}
	}

	#[\app\filters\Login]
	public function updatePassword(){
		
		if(isset($_POST['action'])){

			$user = new \app\models\User();
			
			if(isset($_SESSION['seller_id'])){
				$user = $user->getSeller($_SESSION['email']);
				
				if(password_verify($_POST['current_password'], $user->password_hash)){
					$user->password_hash = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
					$user->updateSellerPassword();//maybe this is where we will have some error checking

					header('location:'.URLROOT.'User/updatePassword?message=Success, password changed.');
				
					}else{
						header('location:'.URLROOT.'User/updatePassword?error=Current password is incorrect.');
					}
			}else if(isset($_SESSION['user_id'])){
				$user = $user->getUser($_SESSION['email']);
				if(password_verify($_POST['current_password'], $user->password_hash)){
						$user->password_hash = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
						$user->updateUserPassword();//maybe this is where we will have some error checking

						header('location:'.URLROOT.'User/updatePassword?message=Success, password changed.');
					
				}else{
					header('location:'.URLROOT.'User/updatePassword?error=Current password is incorrect.');
				}
			}
		
		}else{
			//show the registration form
			$this->view('User/updatePassword');
		}
	}

}