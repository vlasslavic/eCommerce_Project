<?php
namespace app\models;

class User extends \app\core\Model{
	public function getSeller($email){
		$SQL = "SELECT * FROM seller WHERE email LIKE :email";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['email'=>$email]);
		//run some code to return the results
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\User');
		return $STMT->fetch();
	}

	public function getUser($email){
		$SQL = "SELECT * FROM user WHERE email LIKE :email";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['email'=>$email]);
		//run some code to return the results
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\User');
		return $STMT->fetch();
	}

	public function get($seller_id){
		$SQL = "SELECT * FROM seller WHERE seller_id LIKE :seller_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['seller_id'=>$seller_id]);
		//run some code to return the results
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\User');
		return $STMT->fetch();
	}


	public function insertUser(){
		$SQL = "INSERT INTO user(email, password_hash) VALUES (:email, :password_hash)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['email'=>$this->email,
						'password_hash'=>$this->password_hash]);
	}

	public function insertSeller(){
		$SQL = "INSERT INTO seller(email, password_hash) VALUES (:email, :password_hash)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['email'=>$this->email,
						'password_hash'=>$this->password_hash]);
	}



	public function updateSellerPassword(){
		$SQL = "UPDATE seller SET password_hash=:password_hash WHERE seller_id=:seller_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['password_hash'=>$this->password_hash,
						'seller_id'=>$this->seller_id]);
	}

	public function updateUserPassword(){
		$SQL = "UPDATE user SET password_hash=:password_hash WHERE user_id=:user_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['password_hash'=>$this->password_hash,
						'user_id'=>$this->user_id]);
	}

	
}