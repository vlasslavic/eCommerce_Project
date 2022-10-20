<?php
namespace app\controllers;

class Main extends \app\core\Controller{



	public function index(){
		
		
		
		if(isset($_POST['action'])){
			
			if(isLoggedIn()){
				
				if(isset($_POST['delete'])){
						$publication = new \app\models\Post();
						$publication->publication_id = $_POST['delete'];
						$publication->delete();
							header('location:'.URLROOT.'Main/index/');
				}elseif(isset($_POST['deleteComment'])){
					$comment = new \app\models\Comment();
					$comment->comment_id = $_POST['deleteComment'];
					$comment->delete();
						header('location:'.URLROOT.'Main/index/');
				}elseif(isset($_POST['comment'])){
						$profile = new \app\models\Profile();
						$profile = $profile->get( $_SESSION["user_id"]);
						$comment = new \app\models\Comment();
						$comment->profile_id = $profile->profile_id;
						$comment->publication_id = $_POST['publication_id'];
						$comment->comment = $_POST['comment'];
						$comment->date_time = (new \DateTime())->format('Y-m-d H:i:s');
						$comment->insert();
							header('location:'.URLROOT.'Main/index?message=Success!');
				}else{
				header('location:'.URLROOT.'User/index?error=You need an account in order to post comments.');
				}

		}else{
			header('location:'.URLROOT.'User/index?error=You need an account in order to post comments.');
			}
		}else{
			$this->view('Main/index',$data);
		}
	}

	public function search(){
		//To find interesting publications, as a person or user, I can search for captions by search terms.
		$publication = new \app\models\Post();
		$data = $publication->search($_GET['search_term']);
		$this->view('Main/index', $data);
	}
	

	public function about_us(){
		$this->view('Main/about_us');
	}

	public function logout(){
		session_destroy();
		header('location:'.URLROOT.'User/index?message=You\'ve been successfully logged out.');
	}

	#[\app\filters\Login]
	#[\app\filters\Profile]
	public function profile(){
		$this->view('/Account/index');
	}


	
	
}

