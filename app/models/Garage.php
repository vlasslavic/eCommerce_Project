<?php
namespace app\models;

class Garage extends \app\core\Model{
	
	public function get($vehicle_id){
		$SQL = "SELECT * FROM vehicle WHERE vehicle_id=:vehicle_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['vehicle_id'=>$vehicle_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Garage');
		return $STMT->fetch();
	}

	public function getAllCars(){
		//get all newest first
		$SQL = "SELECT * FROM vehicle ORDER BY vehicle_id DESC";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Garage');
		return $STMT->fetchAll();
	}

	public function getAllId(){
		//get all newest first
		$SQL = "SELECT vehicle_id FROM vehicle ORDER BY vehicle_id DESC";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Garage');
		return $STMT->fetchAll();
	}

	public function getAllGarage($user_id){
		$SQL = "SELECT * FROM vehicle WHERE user_id=:user_id ORDER BY vehicle_id DESC";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id'=>$user_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Garage');
		return $STMT->fetchAll();
	}
	
	public function insert(){
		$SQL = "INSERT INTO vehicle (year, make, model, color, vin, user_id) VALUES (:year, :make, :model,:color,:vin, :user_id)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['year'=>$this->year,
						'make'=>$this->make,
						'model'=>$this->model,
						'color'=>$this->color,
						'vin'=>$this->vin,
						'user_id'=>$this->user_id,
						]);
	}
	
	public function update(){
		$SQL = "UPDATE vehicle SET year=:year, make=:make,  model=:model, color=:color, vin=:vin WHERE vehicle_id=:vehicle_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['year'=>$this->year,
						'make'=>$this->make,
						'model'=>$this->model,
						'color'=>$this->color,
						'vin'=>$this->vin,
						'vehicle_id'=>$this->vehicle_id,]);
	}


	public function delete(){
		$SQL = "DELETE FROM vehicle WHERE vehicle_id=:vehicle_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['vehicle_id'=>$this->vehicle_id]);
	}

	public function searchRelated($searchTerm){
		//get all newest first
		$SQL = "SELECT * FROM vehicle WHERE user_id LIKE :searchTerm ORDER BY year DESC LIMIT 5";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['searchTerm'=>"%$searchTerm%"]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Garage');
		return $STMT->fetchAll();
	}


	
}