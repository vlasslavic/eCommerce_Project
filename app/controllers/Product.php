<?php namespace app\controllers;

class Product extends \app\core\Controller{

	public function index($product_id){
        if(!isset($product_id)){
            header('location:'.URLROOT.'Main/index?error=Product not found.');
        }else if(isset($_POST['action'])){
                $cart = new \app\models\Cart();
                $item = new \app\models\Cart();
                $item->quantity=$_POST['inputQuantity'];
                $product = new \app\models\Product();
                $product = $product->get($_POST['product_id']);
                $cart = $cart->getCart($_SESSION["user_id"]);
                if(isset($cart->order_id)){ 
                     if(isset($product->product_id)){
                     $item->order_id=$cart->order_id;
                     $item->product_id=$product->product_id;
                     $item->product_name=($product->product_name);
                     $item->profile_id=($product->profile_id);
                     $item->sell_price=$product->sell_price;
                     $item->cost_price=$product->cost_price;
                     $item->insertProduct();}
                     header('location:'.URLROOT.'Cart/index?message=Item Added.');
                }else{
     
                 // Initiates a Cart, verifies with the DB and sets Session Variable.
                 $cart = new \app\models\Cart();
                 $cart->user_id = ($_SESSION["user_id"]);
                 $cart->insertCart();
                 $cart=$cart->getCart($_SESSION["user_id"]);
                 $_SESSION["order_id"]=$cart->order_id;
     
     
                 // Getting Product datas
                     if(isset($product->product_id)){
                     $item->order_id=$cart->order_id;
                     $item->product_id=$product->product_id;
                     $item->product_name=($product->product_name);
                     $item->profile_id=($product->profile_id);
                     $item->sell_price=$product->sell_price;
                     $item->cost_price=$product->cost_price;
                     $item->insertProduct();
                     header('location:'.URLROOT.'Cart/index?message=Item Added.');
                 }
                }
             
        }else{
        $product = new \app\models\Product();
		$product=$product->get($product_id);
        $productRelated = new \app\models\Product();
		$productRelated = $productRelated->searchRelated($product->profile_id);
        $data = $product;
        $data->related=$productRelated;
		    $this->view('Product/index',$data);
        }
    }

    #[\app\filters\Login]
	#[\app\filters\Profile]
    public function edit(){

        $publication_id = intval($_GET['publication_id']);
        if(!isset($publication_id)){
            header('location:'.URLROOT.'Main/index?error=Product not found.');
	
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

    // public function search(){
	// 	//To find interesting publications, as a person or user, I can search for captions by search terms.
	// 	$publication = new \app\models\Publication();
	// 	$publications = $publication->search($_GET['search_term']);
	// 	$this->view('Main/index', $publications);
	// }
    

}
