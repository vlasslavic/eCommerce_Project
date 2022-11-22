<?php
namespace app\controllers;

class Service extends \app\core\Controller{


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
		    $this->view('Product/index',$data);
        }
    }

    // #[\app\filters\Login]
	// #[\app\filters\Profile]
    // public function edit(){

    //     $publication_id = intval($_GET['publication_id']);
    //     if(!isset($publication_id)){
    //         header('location:'.URLROOT.'Main/index?error=Publication not found.');
	
    //     }else{
    //         if(isset($_POST['action'])){
    //             if(isset($_POST['delete'])){
    //                 $comment = new \app\models\Comment();
    //                 $comment->comment_id = $_POST['delete'];
    //                 $comment->delete();
    //                     header('location:'.URLROOT.'Post/index/?publication_id='.$publication_id.'');
    //             }
    //             else{
	// 					$profile = new \app\models\Profile();
	// 					$profile = $profile->get( $_SESSION["user_id"]);
	// 					$publication = new \app\models\Post();
    //                     $publication = $publication->getPub($publication_id);
	// 					$publication->profile_id = $profile->profile_id;
	// 					$publication->publication_id = $publication_id;
	// 					$publication->caption = $_POST['caption'];
	// 					$publication->date_time = (new \DateTime())->format('Y-m-d H:i:s');
	// 					$publication->update();
						
    //                 header('location:'.URLROOT.'Post/index/?publication_id='.$publication_id.'?message=Success, your post was edited.');
    //             }
    //         }
    //         else{
    //         $data = $publication_id;
	// 		$this->view('Post/edit',$data);}
	//     }
	
    // }

    #[\app\filters\Login]
	#[\app\filters\Profile]
    public function addService(){

        if(isset($_POST['action'])){
                    $service = new \app\models\Service();
                    $service->profile_id = ($_SESSION["profile_id"]);
                    $service->service_name =$_POST['service_name'];
                    $service->service_price = $_POST['service_price'];
                    $time = strtotime(strval($_POST['hours']).":".strval($_POST['minutes']));
                    $duration=date("H:i:s",$time);
                    $service->duration = $duration;
                    $service->insert();
                    
                header('location:'.URLROOT.'Service/list/?message=Success, service Added.');
            
        }
        else{
        $data = "a";
        $this->view('Service/addService');
        }

    }

    #[\app\filters\Login]
	#[\app\filters\Profile]
    public function list(){
        $this->view('Service/list');
    }

    #[\app\filters\Login]
	#[\app\filters\Profile]
	public function delete($service_id){
		//To avoid embarrassment, as a user, I can delete my publication.
		$service = new \app\models\Service();
		$service = $service->get($service_id);
		if($service->profile_id == $_SESSION['profile_id']){	
			$service->delete();
		}
		header('location:'.URLROOT.'Service/list/?message=Success, service Deleted.');
	}

    #[\app\filters\Login]
	#[\app\filters\Profile]
	public function modifyService($service_id){
    if(isset($_POST['action'])){
            $service = new \app\models\Service();
            $service= $service->get($service_id);
            $service->service_id= $service_id;
            $service->service_name = $_POST['service_name'];
            $service->service_price = $_POST['service_price'];
            $time = strtotime(strval($_POST['hours']).":".strval($_POST['minutes']));
            $duration=date("H:i:s",$time);
            $service->duration = $duration;
            $service->update();
            
            
            header('location:'.URLROOT.'Service/list/?message=Success, service Modified.');
        }
        else{
        $service = new \app\models\Service();
		$data = $service->get($service_id);
		if($data->profile_id == $_SESSION['profile_id']){
            $this->view('Service/modifyService',$data);
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