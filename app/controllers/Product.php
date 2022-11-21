<?php
namespace app\controllers;

class Post extends \app\core\Controller{


	public function index(){
        $publication_id = intval($_GET['publication_id']);
        if(!isset($publication_id)){
            header('location:'.URLROOT.'Main/index?error=Publication not found.');
	
        }else{
            if(isset($_POST['action'])){
               if(isset($_POST['delete'])){
                    $publication = new \app\models\Post();
                    $publication->publication_id = $_POST['delete'];
                    $publication->delete();
                        header('location:'.URLROOT.'Main/index/');
            }elseif(isset($_POST['comment']) And isLoggedIn()){



                
                $profile = new \app\models\Profile();
                $profile = $profile->get( $_SESSION["user_id"]);
                $comment = new \app\models\Comment();
                $comment->profile_id = $profile->profile_id;
                $comment->publication_id = $publication_id;
                $comment->comment = $_POST['comment'];
                $comment->date_time = (new \DateTime())->format('Y-m-d H:i:s');
                $comment->insert();
                    header('location:'.URLROOT.'Post/index/?publication_id='.$publication_id.'');
            }
            elseif(isset($_POST['deleteComment'])){
                $comment = new \app\models\Comment();
                $comment->comment_id = $_POST['deleteComment'];
                $comment->delete();
                    header('location:'.URLROOT.'Post/index/?publication_id='.$publication_id.'');
            }else{
                    header('location:'.URLROOT.'Post/index/?publication_id='.$publication_id.'?error=You don`t have the permission.');
                }
            }
            else{
            $data = $publication_id;
			$this->view('Post/index',$data);}
	    }
	
    }

    #[\app\filters\Login]
	#[\app\filters\Profile]
    public function edit(){

        $publication_id = intval($_GET['publication_id']);
        if(!isset($publication_id)){
            header('location:'.URLROOT.'Main/index?error=Publication not found.');
	
        }else{
            if(isset($_POST['action'])){
                if(isset($_POST['delete'])){
                    $comment = new \app\models\Comment();
                    $comment->comment_id = $_POST['delete'];
                    $comment->delete();
                        header('location:'.URLROOT.'Post/index/?publication_id='.$publication_id.'');
                }
                else{
						$profile = new \app\models\Profile();
						$profile = $profile->get( $_SESSION["user_id"]);
						$publication = new \app\models\Post();
                        $publication = $publication->getPub($publication_id);
						$publication->profile_id = $profile->profile_id;
						$publication->publication_id = $publication_id;
						$publication->caption = $_POST['caption'];
						$publication->date_time = (new \DateTime())->format('Y-m-d H:i:s');
						$publication->update();
						
                    header('location:'.URLROOT.'Post/index/?publication_id='.$publication_id.'?message=Success, your post was edited.');
                }
            }
            else{
            $data = $publication_id;
			$this->view('Post/edit',$data);}
	    }
	
    }

    public function addProduct(){

        if(isset($_POST['action'])){
                    $product = new \app\models\Product();
                    
                    $product = new \app\models\Post();
                    $product = $product->getPub($publication_id);
                    $product->profile_id = $profile->profile_id;
                    $product->product_id = $publication_id;
                    $product->caption = $_POST['caption'];
                    $product->date_time = (new \DateTime())->format('Y-m-d H:i:s');
                    $product->update();
                    
                header('location:'.URLROOT.'Product/index/?publication_id='.$publication_id.'?message=Success, your post was edited.');
            
        }
        else{
        $data = "a";
        $this->view('Product/addProduct',$data);
        }

    }

}