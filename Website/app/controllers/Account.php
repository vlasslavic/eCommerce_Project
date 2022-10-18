<?php
namespace app\controllers;

class Account extends \app\core\Controller{
	
	
	public function settings(){
			$profile = new \app\models\Profile();
			$data = $profile->get($_SESSION["user_id"]);
			

		if(isset($_POST['action'])){

				$profile->user_id = $_SESSION["user_id"];
				$profile->first_name = $_POST['first_name'];
				$profile->middle_name = $_POST['middle_name'];
				$profile->last_name = $_POST['last_name'];
				$profile->profile_id = $_POST['profile_id'];

			if($profile->profile_id==""){
				$profile->insert(); 
				header('location:'.URLROOT.'/Account');
			}else{
				$profile->update(); 
				header('location:'.URLROOT.'/Account');}

			
				
			
		
		}else{
		$this->view('Account/settings',$data);}
	}

	// public function profile(){
	// 	$this->view('Account/index');
		
	// }

	#[\app\filters\Login]
	#[\app\filters\Profile]
	public function index(){
		$profile = new \app\models\Profile();
		$data = $profile->get($_SESSION["user_id"]);
			
		$this->view('Account/index', $data);
		
	}

	public function visit(){
		$profile_id = intval($_GET['profile_id']);
		$data=$profile_id ;
		if(isset($_SESSION["user_id"]) And isset($profile_id)){
			$profile = new \app\models\Profile();
			$profile = $profile->get($_SESSION["user_id"]);
			if($profile_id==$profile->profile_id){
				header('location:'.URLROOT.'Account/index');
			}else{
				$this->view('Account/visit',$data);
			};
		}
		else{
		$this->view('Account/visit',$profile_id);}
	}

	// #[\app\filters\Login]
	// #[\app\filters\Profile]
	// public function post(){
	// 	$post = new \app\models\Post();
	// 	$profile = new \app\models\Profile();
	// 	$profile = $profile->get( $_SESSION["user_id"]);

	// 	// $data = $post->get($_SESSION["profile_id"]);
		
		
	// 	if(isset($_POST['action'])){
	// 		$post->profile_id = $profile->profile_id;
	// 		$post->picture = $_POST['image'];
	// 		$post->caption = $_POST['caption'];
	// 		$post->date_time = (new \DateTime())->format('Y-m-d H:i:s');
	// 		$post->publication_id = $_POST['publication_id'];

	// 		if($post->publication_id==""){
	// 			$post->insert(); 
	// 			header('location:'.URLROOT.'/Account');
	// 		}
	// 	elseif(!isset($_POST['push'])){
	// 			$this->view('Account/post');
	// 		}else{
	// 			$post->update(); 
	// 			header('location:'.URLROOT.'/Account');}
	// 	}else{
    //         $filename = $this->imageUpload();
    //         $extension =  "http://localhost/eComm/public/uploads/";
    //         $extension .= $filename;
    //         $data=[
    //             'image' => $filename
    //         ];
    //         $this->view('Account/post',$data);
    //     }

		
		
	// }

	// #[\app\filters\Login]
	// #[\app\filters\Profile]
	// public function imageUpload(){
    //     //default value for the picture
    //     $filename=false;
        
    //     //save the file that gets sent as a picture
    //     $file = $_FILES['picture'];
        
    //     $acceptedTypes = ['image/jpeg'=>'jpg',
    //         'image/gif'=>'gif',
    //         'image/png'=>'png'];
    //     //validate the file
        
    //     if(empty($file['tmp_name']))
    //         return false;

    //     $fileData = getimagesize($file['tmp_name']);

    //     if($fileData!=false && 
    //         in_array($fileData['mime'],array_keys($acceptedTypes))){

    //         //save the file to its permanent location
                
    //         $folder = dirname(APPROOT).'/public/uploads';
    //         $filename = uniqid() . '.' . $acceptedTypes[$fileData['mime']];
    //         move_uploaded_file($file['tmp_name'], "$folder/$filename");
    //     }
    //     return $filename;
    // }

	#[\app\filters\Login]
	#[\app\filters\Profile]
	 public function post(){
			$post = new \app\models\Post();
			$profile = new \app\models\Profile();
			$profile = $profile->get( $_SESSION["user_id"]);
	
			// $data = $post->get($_SESSION["profile_id"]);
			
			
			if(isset($_POST['action'])){
				if(isLoggedIn())
				$post->profile_id = $profile->profile_id;
				// $post->picture = $_POST['image'];
				$post->caption = $_POST['caption'];
				$post->date_time = (new \DateTime())->format('Y-m-d H:i:s');
				$filename = $this->saveFile($_FILES['picture']);
				if($filename){
					$post->picture = $filename;
					$post->insert();
					header('location:'.URLROOT.'/Account/index');
				}else{
					header('location:'.URLROOT.'/Account/post');
				}

			}else{
				$this->view('Account/post');
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
				header('location:'.URLROOT.'/Account');
			}else{
				$profile->update(); 
				header('location:'.URLROOT.'/Account');}

			
				
			
		
		}else{
		$this->view('Account/settings',$data);}
	}
	
	// public function saveProfile(){
	// 	//when we submit the form
	// 	if(isset($_POST['action'])){


	// 			$profile = new \app\models\Profile();//TODO

	// 				$profile->user_id = $_SESSION["user_id"];
	// 				$profile->first_name = $_POST['first_name'];
	// 				$profile->middle_name = $_POST['middle_name'];
	// 				$profile->last_name = $_POST['last_name'];
	// 				$profile->insert();//maybe this is where we will have some error checking

	// 				header('location:'.URLROOT.'Main/index');
				
			
	// 	}else{
	// 		//show the registration form
	// 		$this->view('User/register');
	// 	}
	// }

	
	
	
}

