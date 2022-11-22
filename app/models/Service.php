<?php
namespace app\models;

class Service extends \app\core\Model{
	
	public function get($service_id){
		$SQL = "SELECT * FROM service WHERE service_id=:service_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['service_id'=>$service_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Service');
		return $STMT->fetch();
	}

	public function getAll(){
		//get all newest first
		$SQL = "SELECT * FROM service ORDER BY service_id DESC";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Service');
		return $STMT->fetchAll();
	}

	public function getAllId(){
		//get all newest first
		$SQL = "SELECT service_id FROM service ORDER BY service_id DESC";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Service');
		return $STMT->fetchAll();
	}

	public function getAllServices($profile_id){
		$SQL = "SELECT * FROM service WHERE profile_id=:profile_id ORDER BY service_id DESC";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$profile_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Service');
		return $STMT->fetchAll();
	}
	
	public function insert(){
		$SQL = "INSERT INTO service (service_name, service_price, duration, profile_id) VALUES (:service_name, :service_price, :duration, :profile_id)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['service_name'=>$this->service_name,
						'service_price'=>$this->service_price,
						'duration'=>$this->duration,
						'profile_id'=>$this->profile_id,
						]);
	}

	public function update(){
		$SQL = "UPDATE service SET service_name=:service_name, service_price=:service_price,  duration=:duration  WHERE service_id=:service_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['service_name'=>$this->service_name,
						'service_price'=>$this->service_price,
						'duration'=>$this->duration,
						'service_id'=>$this->service_id,]);
	}


	public function delete(){
		$SQL = "DELETE FROM service WHERE service_id=:service_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['service_id'=>$this->service_id]);
	}

	public function searchRelated($searchTerm){
		//get all newest first
		$SQL = "SELECT * FROM product WHERE product_name LIKE :searchTerm ORDER BY in_stock DESC LIMIT 5";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['searchTerm'=>"%$searchTerm%"]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Product');
		return $STMT->fetchAll();
	}


	
}