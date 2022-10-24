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

	public function getProfile($profile_id){
		$SQL = "SELECT * FROM profile WHERE profile_id LIKE :profile_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$profile_id]);
		//run some code to return the results
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Profile');
		return $STMT->fetch();
	}
	

	public function insert(){
		$SQL = "INSERT INTO profile(user_id, first_name, middle_name, last_name) VALUES (:user_id, :first_name, :middle_name, :last_name)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id'=>$this->user_id,
						'first_name'=>$this->first_name,
                        'middle_name'=>$this->middle_name,
						'last_name'=>$this->last_name]);
	}

	

	public function update(){
		$SQL = "UPDATE profile SET first_name=:first_name, middle_name=:middle_name, last_name=:last_name WHERE profile_id=:profile_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['first_name'=>$this->first_name,
						'middle_name'=>$this->middle_name,
						'last_name'=>$this->last_name,
						'profile_id'=>$this->profile_id]);
	}
	



	
}