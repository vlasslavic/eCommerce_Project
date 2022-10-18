<?php
namespace app\models;

class Owner extends \app\core\Model{

    public function getAll(){
        $SQL ="SELECT * FROM owner";
        $STMT = $this->_connection->prepare($SQL);
        $STMT->execute();// pass any data for the query
        $STMT->setFetchMode(\PDO::FETCH_CLASS,"app\\models\\Owner");
        return $STMT->fetchALL();
    
    }

    public function insert(){
        $SQL ="INSERT INTO owner(first_name, last_name, contact) VALUES (:first_name, :last_name, :contact)";
        $STMT = $this->_connection->prepare($SQL);
        $STMT->execute(['first_name'=>$this->first_name, 'last_name'=>$this->last_name, 'contact'=>$this->contact]);// pass any data for the query
    
    }
}