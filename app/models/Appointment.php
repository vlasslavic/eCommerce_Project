<?php
namespace app\models;

class Appointment extends \app\core\Model{
	
    public function get($appointment_id){
		$SQL = "SELECT * FROM appointment WHERE appointment_id=:appointment_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['appointment_id'=>$appointment_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Appointment');
		return $STMT->fetch();
	}

    public function insertAppointment(){
		$SQL = "INSERT INTO appointment (date_time, created_date, status, odometer, user_id, vehicle_id, service_id) 
                VALUES (:date_time, :created_date, :status, :odometer, :user_id, :vehicle_id, :service_id)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['date_time'=>$this->date_time,
						'created_date'=>$this->created_date,
						'status'=>$this->status,
						'odometer'=>$this->odometer,
						'user_id'=>$this->user_id,
						'vehicle_id'=>$this->vehicle_id,
						'service_id'=>$this->service_id,
						]);
	}

    public function updateAppointment(){
        $SQL = "UPDATE appointment SET date_time=:date_time, created_date=:created_date, status=:status, odometer=:odometer,  vehicle_id=:vehicle_id  WHERE appointment_id=:appointment_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['date_time'=>$this->date_time,
                    'created_date'=>$this->created_date,
                    'status'=>$this->status,
                    'odometer'=>$this->odometer,
                    'vehicle_id'=>$this->vehicle_id,
						'appointment_id'=>$this->appointment_id,
					]);
    }

    public function cancelAppointment(){
        $SQL = "UPDATE appointment SET created_date=:created_date, status=:status  WHERE appointment_id=:appointment_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute([
                    'created_date'=>$this->created_date,
                    'status'=>$this->status,
                   
						'appointment_id'=>$this->appointment_id,
					]);
    }

    public function changeStatus(){
        $SQL = "UPDATE appointment SET  status=:status  WHERE appointment_id=:appointment_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute([
                    
                    'status'=>$this->status,
						'appointment_id'=>$this->appointment_id,
					]);
    }

    public function deleteAppointment(){
		$SQL = "DELETE FROM appointment WHERE appointment_id=:appointment_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['appointment_id'=>$this->appointment_id]);
	}
    
    
    
    public function getAll($user_id){
		$SQL = "SELECT * FROM appointment WHERE user_id=:user_id ORDER BY appointment_id DESC";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id'=>$user_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Appointment');
		return $STMT->fetchAll();
	}

    public function getAllAppointments($profile_id){
        $SQL = "SELECT *
                FROM appointment AS APP 
                LEFT JOIN service AS ITM 
                ON APP.service_id = ITM.service_id
                WHERE ITM.profile_id=:profile_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$profile_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Appointment');
		return $STMT->fetchAll();	
    }

    public function getAllAppID(){
		$SQL = "SELECT appointment_id 
				FROM appointment
				WHERE status NOT LIKE 'Canceled'";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Appointment');
		return $STMT->fetchAll();	
	}

    public function getAllComplete($vehicle_id){
        $SQL = "SELECT *
                FROM appointment AS APP 
                LEFT JOIN service AS ITM 
                ON APP.service_id = ITM.service_id
                WHERE APP.vehicle_id=:vehicle_id
                AND status LIKE 'Completed'";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['vehicle_id'=>$vehicle_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Appointment');
		return $STMT->fetchAll();	
    }

    
}