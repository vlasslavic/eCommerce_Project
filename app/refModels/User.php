<?php
namespace app\models;

class User extends \app\core\Model{
	public function get($username){
		$SQL = "SELECT * FROM user WHERE username LIKE :username";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['username'=>$username]);
		//run some code to return the results
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\User');
		return $STMT->fetch();
	}

	public function getUser($user_id){
		$SQL = "SELECT * FROM user WHERE user_id LIKE :user_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id'=>$user_id]);
		//run some code to return the results
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\User');
		return $STMT->fetch();
	}


	public function insert(){
		$SQL = "INSERT INTO user(username, password_hash) VALUES (:username, :password_hash)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['username'=>$this->username,
						'password_hash'=>$this->password_hash]);
	}



	public function updatePassword(){
		$SQL = "UPDATE user SET password_hash=:password_hash WHERE user_id=:user_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['password_hash'=>$this->password_hash,
						'user_id'=>$this->user_id]);
	}

	
}