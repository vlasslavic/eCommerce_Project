<?php
namespace app\models;

class Comment extends \app\core\Model{
	
	public function get($comment_id){
		$SQL = "SELECT * FROM comment WHERE comment_id LIKE :comment_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['comment_id'=>$comment_id]);
		//run some code to return the results
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Comment');
		return $STMT->fetch();
	}

	public function getOneComment($publication_id){
		$SQL = "SELECT * FROM comment WHERE publication_id LIKE :publication_id ORDER BY date_time DESC";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['publication_id'=>$publication_id]);
		//run some code to return the results
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Comment');
		return $STMT->fetch();
	}

	public function getALL($publication_id){
		//get all newest first
		$SQL = "SELECT * FROM comment WHERE publication_id LIKE :publication_id ORDER BY date_time DESC ";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['publication_id'=>$publication_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Comment');
		return $STMT->fetchAll();
	}

	public function getAllUserComment($profile_id){
		//get all newest first
		$SQL = "SELECT * FROM comment WHERE profile_id LIKE :profile_id ORDER BY date_time DESC ";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$profile_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Comment');
		return $STMT->fetchAll();
	}

	public function insert(){
		$SQL = "INSERT INTO comment(publication_id ,profile_id, comment, date_time) VALUES (:publication_id, :profile_id, :comment, :date_time)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['publication_id'=>$this->publication_id,
						'profile_id'=>$this->profile_id,
						'comment'=>$this->comment,
						'date_time'=>$this->date_time]);
	}

	public function delete(){
		$SQL = "DELETE FROM comment WHERE comment_id=:comment_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['comment_id'=>$this->comment_id]);
	}
	

	// public function updateProfile(){
	// 	$SQL = "UPDATE profile SET(first_name, middle_name, last_name) VALUES ( :first_name, :middle_name, :last_name) WHERE profile_id=:profile_id";
	// 	$STMT = self::$_connection->prepare($SQL);
	// 	$STMT->execute(['user_id'=>$this->user_id,
	// 					'first_name'=>$this->first_name,
    //                     'middle_name'=>$this->middle_name,
	// 					'last_name'=>$this->last_name]);
	// }

	public function update(){
		$SQL = "UPDATE comment SET  comment=:comment, date_time=:date_time WHERE comment_id=:comment_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute([
						'comment'=>$this->comment,
						'date_time'=>$this->date_time,
						'comment_id'=>$this->comment_id]);
	}
	

/*
	public function delete(){
		$SQL = "DELETE FROM owner WHERE owner_id=:owner_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['owner_id'=>$this->owner_id]);
	}

	public function deleteAnimals(){
		$SQL = "DELETE FROM animal WHERE owner_id=:owner_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['owner_id'=>$this->owner_id]);
	}
*/

	
}