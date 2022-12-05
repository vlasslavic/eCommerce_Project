<?php
namespace app\controllers;

class Vet extends \app\core\Controller{

    public function index(){

        $owner = new \app\models\Owner();
        $owners = $owner->getAll();

        print_r($owners);
    }

    public function addOwner(){
        if(isset($_POST['action'])){
            $newOwner = new \app\models\Owner();
            $newOwner -> first_name = $_POST['first_name'];
            $newOwner -> last_name = $_POST['last_name'];
            $newOwner -> contact = $_POST['contact'];
            //call insert
            $newOwner->insert();
            header('location:/Vet');
        }else{
            $this->view('Vet/addOwner');
        }

    }
}