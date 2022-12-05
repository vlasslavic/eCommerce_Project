<?php
namespace app\models;

class Product extends \app\core\Model{
	
	public function get($product_id){
		$SQL = "SELECT * FROM product WHERE product_id=:product_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['product_id'=>$product_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Product');
		return $STMT->fetch();
	}

	public function getAll(){
		//get all newest first
		$SQL = "SELECT * FROM product ORDER BY profile_id DESC";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Product');
		return $STMT->fetchAll();
	}
	

	public function getAllId(){
		//get all newest first
		$SQL = "SELECT product_id FROM product ORDER BY profile_id DESC";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Product');
		return $STMT->fetchAll();
	}

	public function getAllProducts($profile_id){
		$SQL = "SELECT * FROM product WHERE profile_id=:profile_id ORDER BY product_id DESC";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$profile_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Product');
		return $STMT->fetchAll();
	}
	
	public function insert(){
		$SQL = "INSERT INTO product (profile_id, product_name, description, image, in_stock, sell_price, cost_price) VALUES (:profile_id, :product_name, :description, :image, :in_stock, :sell_price, :cost_price)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$this->profile_id,
						'product_name'=>$this->product_name,
                        'description'=>$this->description,
						'image'=>$this->image,
						'in_stock'=>$this->in_stock,
						'sell_price'=>$this->sell_price,
						'cost_price'=>$this->cost_price,
						]);
	}

	public function update(){
		$SQL = "UPDATE product SET product_name=:product_name, description=:description,  in_stock=:in_stock, sell_price=:sell_price, cost_price=:cost_price WHERE product_id=:product_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['product_id'=>$this->product_id,
						'product_name'=>$this->product_name,
						'description'=>$this->description,
						'in_stock'=>$this->in_stock,
						'sell_price'=>$this->sell_price,
						'cost_price'=>$this->cost_price,]);
	}

	
	public function updateWithImage(){
		$SQL = "UPDATE product SET product_name=:product_name, description=:description, image=:image, in_stock=:in_stock, sell_price=:sell_price, cost_price=:cost_price WHERE product_id=:product_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['product_id'=>$this->product_id,
						'product_name'=>$this->product_name,
						'description'=>$this->description,
						'image'=>$this->image,
						'in_stock'=>$this->in_stock,
						'sell_price'=>$this->sell_price,
						'cost_price'=>$this->cost_price,]);
	}

	public function delete(){
		$SQL = "DELETE FROM product WHERE product_id=:product_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['product_id'=>$this->product_id]);
	}

	public function searchRelated($searchTerm){
		//get all newest first
		$SQL = "SELECT * FROM product WHERE profile_id LIKE :searchTerm ORDER BY in_stock DESC LIMIT 5";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['searchTerm'=>"%$searchTerm%"]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Product');
		return $STMT->fetchAll();
	}

	public function search($searchTerm){
		//get all newest first
		$SQL = "SELECT * FROM product WHERE product_name LIKE :searchTerm";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['searchTerm'=>"%$searchTerm%"]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Product');
		return $STMT->fetchAll();
	}


	
}