<?php
namespace app\core;

class Controller{
//TODO: add data to display with the view
	protected function view($name, $data=[]){
		//call in a view to display
		include('app\\views\\' . $name . '.php');
	}


	public function model($modelName){
		require_once '../app/models/'.$modelName.'.php';
		return new $modelName;
	}



	public function saveFile($file){
		if(empty($file['tmp_name']))
			return false;

		$check = getimagesize($file['tmp_name']);
		$allowed_types = ['image/jpeg'=>'jpg', 'image/png'=>'png'];
		if(in_array($check['mime'], array_keys($allowed_types))){
			 $ext = $allowed_types[$check['mime']];
			 $filename = uniqid() . ".$ext";
			 $folder = dirname(APPROOT).'/public/uploads';
			 move_uploaded_file($file['tmp_name'], "$folder/$filename");
			 return $filename;
		}else
			return '';
	}

}