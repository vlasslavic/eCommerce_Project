<?php
namespace app\controllers;

class Appointments extends \app\core\Controller{


	public function index(){
        $app = new \app\models\Appointment();
		$data=$app->getAll($_SESSION['user_id']);
        $this->view('Appointments/index',$data);
    }

    public function myAppointments(){
        $app = new \app\models\Appointment();
		$data=$app->getAllAppointments($_SESSION['profile_id']);
        $this->view('Appointments/myAppointments',$data);
    }

    public function schedule($data){
        $service = new \app\models\Service();
        $app = new \app\models\Appointment();

        if(isset($_POST['action'])){
            $today = date("Y-m-d H:i:s");
            $app->user_id = ($_SESSION["user_id"]);
            $app->vehicle_id =$_POST['vehicle_id'];
            $app->service_id = $_POST['service_id'];
            $app->odometer = $_POST['odometer'];
            $app->status = 'Initiated';
            $app->created_date = $today;
            $app->date_time = $_POST['finalDateTime'];
            $app->insertAppointment();
            header('location:'.URLROOT.'Appointments/index?message=Succes: Appointment set!.');

            // date_time'=>$this->date_time,
			// 			'created_date'=>$this->created_date,
			// 			'status'=>$this->status,
			// 			'odometer'=>$this->odometer,
			// 			'user_id'=>$this->user_id,
			// 			'vehicle_id'=>$this->vehicle_id,
			// 			'service_id'=>$this->service_id,
            // finalDateTime
            
            // if(isset($data->coupon->discount_id)And isset($data->order_id)){
            //     $order->order_id=$data->order_id;
            //     $order->discount_id=($data->coupon->discount_id);
            //     $order->addDiscount();
            //     header('location:'.URLROOT.'Cart/index?message=Coupon added.');
            // }
        }; if(isset($data)){ 
            $data=$service->get($data);

            $this->view('Appointments/schedule',$data);
        }
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

       
    }

    public function modifyAppointment($data){
        $service = new \app\models\Service();
        $app = new \app\models\Appointment();

        if(isset($_POST['action'])){
            $today = date("Y-m-d H:i:s");
            $app->appointment_id=$data;
            $app->user_id = ($_SESSION["user_id"]);
            $app->vehicle_id =$_POST['vehicle_id'];
            $app->service_id = $_POST['service_id'];
            $app->odometer = $_POST['odometer'];
            $app->status = 'Initiated';
            $app->created_date = $today;
            $app->date_time = $_POST['finalDateTime'];
            $app->updateAppointment();
            header('location:'.URLROOT.'Appointments/index?message=Succes: Appointment updated!.');

            // date_time'=>$this->date_time,
			// 			'created_date'=>$this->created_date,
			// 			'status'=>$this->status,
			// 			'odometer'=>$this->odometer,
			// 			'user_id'=>$this->user_id,
			// 			'vehicle_id'=>$this->vehicle_id,
			// 			'service_id'=>$this->service_id,
            // finalDateTime
            
            // if(isset($data->coupon->discount_id)And isset($data->order_id)){
            //     $order->order_id=$data->order_id;
            //     $order->discount_id=($data->coupon->discount_id);
            //     $order->addDiscount();
            //     header('location:'.URLROOT.'Cart/index?message=Coupon added.');
            // }
        }; if(isset($data)){ 
            $data=$app->get($data);

            $this->view('Appointments/modifyAppointment',$data);
        }
       
    }

    #[\app\filters\Login]
	
	public function cancelAppointment($appointment_id){
		if(isset($appointment_id)){
        $today = date("Y-m-d H:i:s");
        $app = new \app\models\Appointment();
        $app->appointment_id=$appointment_id;
        $app->status = 'Canceled';
        $app->created_date = $today;
		$app->cancelAppointment();
		
		header('location:'.URLROOT.'Appointments/index/?message=Success, appointment Canceled.');}
	}

    #[\app\filters\Login]
	
	public function changeStatusConfirm($appointment_id){
		if(isset($appointment_id)){
        $app = new \app\models\Appointment();
        $app->appointment_id=$appointment_id;
        $app->status = 'Confirmed';
		$app->changeStatus();
		
		header('location:'.URLROOT.'Appointments/myAppointments/?message=Success, appointment confirmed.');}
	}

    public function changeStatusDone($appointment_id){
		if(isset($appointment_id)){
        $app = new \app\models\Appointment();
        $app->appointment_id=$appointment_id;
        $app->status = 'Completed';
		$app->changeStatus();
		header('location:'.URLROOT.'Appointments/myAppointments/?message=Success, appointment confirmed.');}
	}

    public function delete($appointment_id){
		if(isset($appointment_id)){
        $app = new \app\models\Appointment();
        $app->appointment_id=$appointment_id;
		$app->deleteAppointment();
		header('location:'.URLROOT.'Appointments/myAppointments/?message=Success, appointment confirmed.');}
	}
    

}