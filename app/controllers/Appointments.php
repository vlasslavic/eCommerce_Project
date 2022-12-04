<?php
namespace app\controllers;

class Appointments extends \app\core\Controller{


	public function index(){
        // if(!isset($product_id)){
        //     $this->view('Main/index');
        // }else{
        // $product = new \app\models\Product();
		// $product=$product->get($product_id);
        // $productRelated = new \app\models\Product();
		// $productRelated = $productRelated->searchRelated($product->product_name);
        // $data = $product;
        // $data->related=$productRelated;
		//     $this->view('Product/index',$data);
        // }

        $this->view('Appointments/index');
    }

}