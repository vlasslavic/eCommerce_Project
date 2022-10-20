<?php
namespace app\models;

class Post extends \app\core\Model{
	
	public function get($profile_id){
		$SQL = "SELECT * FROM publication WHERE profile_id LIKE :profile_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$profile_id]);
		//run some code to return the results
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Post');
		return $STMT->fetch();
	}

	public function getPub($publication_id){
		$SQL = "SELECT * FROM publication WHERE publication_id LIKE :publication_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['publication_id'=>$publication_id]);
		//run some code to return the results
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Post');
		return $STMT->fetch();
	}

	public function getAll(){
		//get all newest first
		$SQL = "SELECT * FROM publication ORDER BY date_time DESC";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Post');
		return $STMT->fetchAll();
	}

	public function getAllPub($profile_id){
		//get all newest first
		$SQL = "SELECT * FROM publication WHERE profile_id LIKE :profile_id ORDER BY date_time DESC";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$profile_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Post');
		return $STMT->fetchAll();
	}

	public function insert(){
		$SQL = "INSERT INTO publication(profile_id, picture, caption, date_time) VALUES (:profile_id, :picture, :caption, :date_time)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$this->profile_id,
						'picture'=>$this->picture,
                        'caption'=>$this->caption,
						'date_time'=>$this->date_time]);
	}

	

	public function update(){
		$SQL = "UPDATE publication SET picture=:picture, caption=:caption, date_time=:date_time WHERE publication_id=:publication_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['picture'=>$this->picture,
						'caption'=>$this->caption,
						'date_time'=>$this->date_time,
						'publication_id'=>$this->publication_id]);
	}
	
	public function delete(){
		$SQL = "DELETE FROM publication WHERE publication_id=:publication_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['publication_id'=>$this->publication_id]);
	}

	public function search($searchTerm){
		//get all newest first
		$SQL = "SELECT * FROM publication WHERE caption LIKE :searchTerm ORDER BY date_time DESC";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['searchTerm'=>"%$searchTerm%"]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Post');
		return $STMT->fetchAll();
	}

	public function deleteComment(){
		$SQL = "DELETE FROM owner WHERE owner_id=:owner_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['owner_id'=>$this->owner_id]);
	}

	

	
}