<?php
namespace app\controllers;

class Orders extends \app\core\Controller{


	public function index($product_id){
        if(!isset($product_id)){
            $this->view('Main/index');
        }else{
        $product = new \app\models\Product();
		$product=$product->get($product_id);
        $productRelated = new \app\models\Product();
		$productRelated = $productRelated->searchRelated($product->product_name);
        $data = $product;
        $data->related=$productRelated;
		    $this->view('Orders/index',$data);
        }
    }

    #[\app\filters\Login]
	#[\app\filters\Profile]
    public function list(){
        $order = new \app\models\Cart();
        $data=$order->getPaidOrders($_SESSION['profile_id']);
        if(isset($data)){
            $this->view('Orders/list',$data);
        }else{
            $this->view('Orders/list');
       
        }
    }

    #[\app\filters\Login]
	#[\app\filters\User]
    public function myList(){
        $order = new \app\models\Cart();
        $data=$order->getMyOrders($_SESSION['user_id']);
        if(isset($data)){
            $this->view('Orders/myList',$data);
        }else{
            $this->view('Orders/myList');
       
        }
    }

    #[\app\filters\Login]
	#[\app\filters\Profile]
    public function ship($data){
        if(isset($data)){
        $item = new \app\models\Cart();
        $item = $item->getItem($data);
        $today = date("Y-m-d H:i:s");
            $item->ship_date= $today;
            $item->shipOrder();
            $item->status="Shipped";
            $item->updateStatus();
            header('location:'.URLROOT.'Orders/list?message=Success: Order #'.$data.' Shipped.');
        }else{
            header('location:'.URLROOT.'Orders/list?error=Error: something went wrong, please try again later.');
        }
    }

    #[\app\filters\Login]
	#[\app\filters\Profile]
    public function cancel($data){
        if(isset($data)){
        $item = new \app\models\Cart();
        $item = $item->getItem($data);
            $item->status="Canceled";
            $item->updateStatus();
            header('location:'.URLROOT.'Orders/list?message=Success: Order #'.$data.' Canceled.');
        }else{
            header('location:'.URLROOT.'Orders/list?error=Error: something went wrong, please try again later.');
        }
    }

}