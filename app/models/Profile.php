<?php
namespace app\models;

class Profile extends \app\core\Model{
	
	public function get($seller_id){
		$SQL = "SELECT * FROM profile WHERE seller_id LIKE :seller_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['seller_id'=>$seller_id]);
		//run some code to return the results
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Profile');
		return $STMT->fetch();
	}

	public function getAll(){
		//get all newest first
		$SQL = "SELECT * FROM profile ORDER BY profile_id DESC";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Profile');
		return $STMT->fetchAll();
	}

	public function getAllId(){
		//get all newest first
		$SQL = "SELECT profile_id FROM profile ORDER BY profile_id DESC";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Profile');
		return $STMT->fetchAll();
	}

	public function getProfile($profile_id){
		$SQL = "SELECT * FROM profile WHERE profile_id LIKE :profile_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$profile_id]);
		//run some code to return the results
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Profile');
		return $STMT->fetch();
	}
	
	public function insert(){
		$SQL = "INSERT INTO profile (seller_id, business_name, description, picture, phone, email, address, isEnabled) VALUES (:seller_id, :business_name, :description, :picture, :phone, :email, :address, :isEnabled)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['seller_id'=>$this->seller_id,
						'business_name'=>$this->business_name,
                        'description'=>$this->description,
						'picture'=>$this->picture,
						'phone'=>$this->phone,
						'email'=>$this->email,
						'address'=>$this->address,
						'isEnabled'=>1,
						]);
	}

	public function updateWithPicture(){
		$SQL = "UPDATE profile SET business_name=:business_name, description=:description, picture=:picture, phone=:phone, email=:email, address=:address WHERE profile_id=:profile_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['business_name'=>$this->business_name,
                        'description'=>$this->description,
						'picture'=>$this->picture,
						'phone'=>$this->phone,
						'email'=>$this->email,
						'address'=>$this->address,
						'profile_id'=>$this->profile_id]);
	}

	public function update(){
		$SQL = "UPDATE profile SET business_name=:business_name, description=:description, phone=:phone, email=:email, address=:address WHERE profile_id=:profile_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['business_name'=>$this->business_name,
                        'description'=>$this->description,
						'phone'=>$this->phone,
						'email'=>$this->email,
						'address'=>$this->address,
						'profile_id'=>$this->profile_id]);
	}

	public function changeVisibility(){
		$SQL = "UPDATE profile SET isEnabled=:isEnabled WHERE profile_id=:profile_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['isEnabled'=>$this->isEnabled,
						'profile_id'=>$this->profile_id]);
	}

	
	


	



	
}