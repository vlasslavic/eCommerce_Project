<?php
namespace app\controllers;

class Contact extends \app\core\Controller{
	// public function index(){
	// 	$this->view('Contact/index');
	// }

	public function read(){
		$data = file('app\resources\log.txt', FILE_IGNORE_NEW_LINES);
		$this->view('Contact/read',$data );
	}


	public function index(){
		$this->view('Contact/index');
	}

	public function sendMessage(){
		if(isset($_POST['submit'])){
			
			if(file_exists('app/resources/log.txt')){
				$fh = fopen('app/resources/log.txt', 'a');
				$message['email'] = $_POST['email'];
				$message['message'] = $_POST['message'];
				$toW = json_encode($message);
				flock($fh, LOCK_EX);
				fwrite($fh,  "$toW\n");  
				flock($fh, LOCK_UN);
				fclose($fh);
				header('location:/Contact/read');
			}

		
		}
	}
	
}