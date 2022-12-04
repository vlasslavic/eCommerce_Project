<?php
namespace app\controllers;

use DateTime;

#[\app\filters\Login]
#[\app\filters\User]
class Cart extends \app\core\Controller{


	public function index(){
        $cart = new \app\models\Cart();
        $order = new \app\models\Cart();
        $data = $cart->getCart($_SESSION["user_id"]);
        
        
        if(isset($_POST['action'])){
            $data->coupon = $cart->getCoupon($_POST['coupon']);
            if(isset($data->coupon->discount_id)And isset($data->order_id)){
                $order->order_id=$data->order_id;
                $order->discount_id=($data->coupon->discount_id);
                $order->addDiscount();
                header('location:'.URLROOT.'Cart/index?message=Coupon added.');
            }
        }
        if(isset($data->order_id)){
            $data->items=$cart->getAllItems($data->order_id);
            $data->coupon = $cart->getCouponByID($data->discount_id);
        }
        // else if(isset($_SESSION["order_id"])){
        //     $data->items=$cart->getAllItems($_SESSION["order_id"]);
        //     $data->coupon = $cart->getCouponByID($data->discount_id);
        //     }
        if(isset($data)){
            $this->view('Cart/index',$data);
        }else{
            $this->view('Cart/index');}
    }

    public function checkout(){
        $cart = new \app\models\Cart();
        $order = new \app\models\Cart();
        $data = $cart->getCart($_SESSION["user_id"]);
        $data->items=Null;
        if(isset($_POST['action'])){
            if(isset($_POST['zip'])And(isset($_POST['order_id']))){
                $order = new \app\models\Cart();
                $order=$order->getCartByID($_POST['order_id']);
                if(isset($order->order_id)){
                    
                    
                    $today = date("Y-m-d H:i:s");
                    // $mysqltime = date ('Y-m-d H:i:s', strtotime($toady));
                    $order->order_date= $today;
                    $order->total_price=$_POST['total_price'];
                    $order->shipping_info=($_POST['firstName']." ".$_POST['lastName']."\r\n".$_POST['address']
                                            ."\r\n".$_POST['address2']."\r\n".$_POST['province']." ".$_POST['zip']." ".$_POST['country']
                                            ."\r\n".$_POST['email']."\r\n".$_POST['phone']);
                    $order->status="Paid";
                    $order->checkout();
                    $order->insertCart();
                    $_SESSION['order_id']=$order->getCart($_SESSION['user_id']);
                    header('location:'.URLROOT.'Cart/confirmation?order_id=2');
                }else{
                // $order
                header('location:'.URLROOT.'Cart/confirmation?error=Something went wrong, please try again later.');}

               
            }
            else if(isset($_POST['coupon'])){
            $data->coupon = $cart->getCoupon($_POST['coupon']);
            if(isset($data->coupon->discount_id)And isset($data->order_id)){
                $order->order_id=$data->order_id;
                $order->discount_id=($data->coupon->discount_id);
                $order->addDiscount();
            }
        }
        }
        if(isset($data->order_id)){
            $data->items=$cart->getAllItems($data->order_id);
            $data->coupon = $cart->getCouponByID($data->discount_id);}
        else{
            $data->items=$cart->getAllItems($_SESSION["order_id"]);
            $data->coupon = $cart->getCouponByID($data->discount_id);
            }
        if(isset($data)){
            $this->view('Cart/checkout',$data);
        }else{
            $this->view('Cart/checkout');}
    }

    public function addToCart($data){
        if(isset($data)){
           $cart = new \app\models\Cart();
           $item = new \app\models\Cart();
           $item->quantity="1";
           $product = new \app\models\Product();
           $product = $product->get($data);
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
            header('location:'.URLROOT.'Cart/index?message=Error, Please try Again Later.');
        }
    }

    public function deleteProduct($data){
        $item = new \app\models\Cart();
        if(isset($data)){ 
            $item->order_item_id=$data;
            $item->deleteProduct();
            header('location:'.URLROOT.'Cart/index?message=Item Deleted.');
        }
        else{ 
            header('location:'.URLROOT.'Cart/index?message=Error, please try again.');
        }
    }

    public function addQuantity($data){
        $item = new \app\models\Cart();
        $item =  $item->getItem($data);
        if(isset($item->quantity)){ 
            $item->quantity=(($item->quantity)+1);
            $item->updateQuantity();
            header('location:'.URLROOT.'Cart/index?message=Quantity Updated.');
        }
        else{ 
            header('location:'.URLROOT.'Cart/index?message=Error, please try again.');
        }
    }

    public function substractQuantity($data){
        $item = new \app\models\Cart();
        $item =  $item->getItem($data);
        if(isset($item->quantity)){
            if(($item->quantity)>0){
                $item->quantity=(($item->quantity)-1);
                $item->updateQuantity();
                header('location:'.URLROOT.'Cart/index?message=Quantity Updated.');}
        else{header('location:'.URLROOT.'Cart/index');}
        }
        else{ 
            header('location:'.URLROOT.'Cart/index?message=Error, please try again.');
        }
    }

    public function confirmation(){ 
        if(isset($_GET['order_id'])){
            $cart = new \app\models\Cart();
            $data = $cart->getOrderByID($_GET['order_id']);
            if(isset($data->order_id)){
                $data->items=$cart->getAllItems($data->order_id);
            }
           
            if(isset($data)){
                $this->view('Cart/confirmation',$data);
            }else{
                $this->view('Cart/confirmation');}

            
        }else{
            $this->view('Cart/confirmation');}
    }
   
}