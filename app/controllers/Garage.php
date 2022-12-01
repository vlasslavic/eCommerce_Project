<?php
namespace app\controllers;

class Garage extends \app\core\Controller{


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
    #[\app\filters\User]
    public function addCar(){

        if(isset($_POST['action'])){
                    $garage = new \app\models\Garage();
                    $garage->user_id = ($_SESSION["user_id"]);
                    $garage->year =$_POST['year'];
                    $garage->make = $_POST['make'];
                    $garage->model = $_POST['model'];
                    $garage->color =$_POST['color'];
                    $garage->vin = $_POST['vin'];
                    $garage->insert();     
                header('location:'.URLROOT.'Garage/myList/?message=Success, car Added.');
            
        }
        else{
            
        $curl = curl_init();
// Get Year from CarApi
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://car-api2.p.rapidapi.com/api/years",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                    "X-RapidAPI-Host: car-api2.p.rapidapi.com",
                    "X-RapidAPI-Key: 3a8d458fcbmsh2629ef8a3e24463p1e1a3ejsn708971d75355"
                ],
            ]);
            $data = new \app\models\Garage();
            $responseYear = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                $data->yearSelect=json_decode($responseYear);
            }
// Get Makes from CarApi
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://car-api2.p.rapidapi.com/api/makes?direction=asc&sort=id",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                    "X-RapidAPI-Host: car-api2.p.rapidapi.com",
                    "X-RapidAPI-Key: 3a8d458fcbmsh2629ef8a3e24463p1e1a3ejsn708971d75355"
                ],
            ]);
            
            $responseMake = curl_exec($curl);
            $err = curl_error($curl);
            
            curl_close($curl);
            
            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                $data->makeSelect=json_decode($responseMake);
            }


        $this->view('Garage/addCar',$data);
        }

    }

    #[\app\filters\Login]
	
    public function myList(){
        $this->view('Garage/mylist');
    }

    #[\app\filters\Login]
	
	public function delete($vehicle_id){
		//To avoid embarrassment, as a user, I can delete my publication.
		$garage = new \app\models\Garage();
		$garage = $garage->get($vehicle_id);
		if($garage->user_id == $_SESSION['user_id']){	
			$garage->delete();
		}
		header('location:'.URLROOT.'Garage/myList/?message=Success, car deleted.');
	}

    #[\app\filters\Login]
	
	public function modifyGarage($vehicle_id){
    if(isset($_POST['action'])){
            $garage = new \app\models\Garage();
            $garage = $garage->get($vehicle_id);
            $garage->user_id = ($_SESSION["user_id"]);
            $garage->vehicle_id=$vehicle_id;
            $garage->year =$_POST['year'];
            $garage->make = $_POST['make'];
            $garage->model = $_POST['model'];
            $garage->color =$_POST['color'];
            $garage->vin = $_POST['vin'];
            $garage->update();
            
            
            header('location:'.URLROOT.'Garage/myList/?message=Success, car modified.');
        }
        else{

          
        $garage = new \app\models\Garage();
		$data = $garage->get($vehicle_id);
		if($data->user_id == $_SESSION['user_id']){
            $curl = curl_init();
            // Get Year from CarApi
                        curl_setopt_array($curl, [
                            CURLOPT_URL => "https://car-api2.p.rapidapi.com/api/years",
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_ENCODING => "",
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 30,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => "GET",
                            CURLOPT_HTTPHEADER => [
                                "X-RapidAPI-Host: car-api2.p.rapidapi.com",
                                "X-RapidAPI-Key: 3a8d458fcbmsh2629ef8a3e24463p1e1a3ejsn708971d75355"
                            ],
                        ]);
                        
                        $responseYear = curl_exec($curl);
                        $err = curl_error($curl);
            
                        curl_close($curl);
            
                        if ($err) {
                            echo "cURL Error #:" . $err;
                        } else {
                            $data->yearSelect=json_decode($responseYear);
                        }
            // Get Makes from CarApi
                        curl_setopt_array($curl, [
                            CURLOPT_URL => "https://car-api2.p.rapidapi.com/api/makes?direction=asc&sort=id",
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_ENCODING => "",
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 30,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => "GET",
                            CURLOPT_HTTPHEADER => [
                                "X-RapidAPI-Host: car-api2.p.rapidapi.com",
                                "X-RapidAPI-Key: 3a8d458fcbmsh2629ef8a3e24463p1e1a3ejsn708971d75355"
                            ],
                        ]);
                        
                        $responseMake = curl_exec($curl);
                        $err = curl_error($curl);
                        
                        curl_close($curl);
                        
                        if ($err) {
                            echo "cURL Error #:" . $err;
                        } else {
                            $data->makeSelect=json_decode($responseMake);
                        }


            $this->view('Garage/modifyGarage',$data);
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