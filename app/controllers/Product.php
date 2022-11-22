<?php
namespace app\controllers;

class Product extends \app\core\Controller{


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
                    $product->profile_id = ($_SESSION["profile_id"]);
                    $product->product_name =$_POST['product_name'];
                    $product->description = $_POST['description'];
                    if(isset($_FILES['picture'])){
                        $filename = $this->saveFile($_FILES['picture']);
                        $product->image = $filename;
                    }
                    $product->in_stock = $_POST['in_stock'];
                    $product->sell_price = $_POST['sell_price'];
                    $product->cost_price = $_POST['cost_price'];
                    $product->insert();
                    
                header('location:'.URLROOT.'Product/list/?message=Success, product Added.');
            
        }
        else{
        $data = "a";
        $this->view('Product/addProduct');
        }

    }

    public function list(){
        $this->view('Product/list');
    }

    #[\app\filters\Login]
	#[\app\filters\Profile]
	public function delete($product_id){
		//To avoid embarrassment, as a user, I can delete my publication.
		$product = new \app\models\Product();
		$product = $product->get($product_id);
		if($product->profile_id == $_SESSION['profile_id']){
			unlink('public/uploads/'.$product->image.'');
			$product->delete();
		}
		header('location:'.URLROOT.'Product/list/?message=Success, product Deleted.');
	}

    #[\app\filters\Login]
	#[\app\filters\Profile]
	public function modifyProduct($product_id){
        
        if(isset($_POST['action'])){
            $product = new \app\models\Product();
            $product= $product->get($product_id);
            $product->product_id= $product_id;
            $product->product_name =$_POST['product_name'];
            $product->description = $_POST['description'];
            $product->in_stock = $_POST['in_stock'];
            $product->sell_price = $_POST['sell_price'];
            $product->cost_price = $_POST['cost_price'];
            $product->image = $_POST['caption'];
            if(empty($_FILES)){
                $product->update();
            }elseif(!empty($_FILES)){
                $filename = $this->saveFile($_FILES['picture']);
                if(!$filename==""){
                    unlink('public/uploads/'.$product->image.'');
                    $product->image = $filename;
                }
                    $product->updateWithImage();
            }
            
            header('location:'.URLROOT.'Product/list/?message=Success, product Modified.');
        }
        else{
        $product = new \app\models\Product();
		$data = $product->get($product_id);
		if($data->profile_id == $_SESSION['profile_id']){
            $this->view('Product/modifyProduct',$data);
        }
    }
    }

}