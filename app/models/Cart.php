<?php
namespace app\models;

class Cart extends \app\core\Model{
	
    public function getCart($user_id){
		$SQL = "SELECT * FROM orders WHERE user_id=:user_id AND Status='Incomplete'";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id'=>$user_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Cart');
		return $STMT->fetch();
	}

	public function getCartByID($order_id){
		$SQL = "SELECT * FROM orders WHERE order_id=:order_id AND Status='Incomplete'";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['order_id'=>$order_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Cart');
		return $STMT->fetch();
	}

	public function getOrderByID($order_id){
		$SQL = "SELECT * FROM orders WHERE order_id=:order_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['order_id'=>$order_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Cart');
		return $STMT->fetch();
	}

	public function getItem($order_item_id){
		$SQL = "SELECT * FROM order_item WHERE order_item_id=:order_item_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['order_item_id'=>$order_item_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Cart');
		return $STMT->fetch();
	}

	
	public function getCoupon($code){
		$SQL = "SELECT * FROM discount WHERE code=:code";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['code'=>$code]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Cart');
		return $STMT->fetch();
	}

	public function getCouponByID($discount_id){
		$SQL = "SELECT * FROM discount WHERE discount_id=:discount_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['discount_id'=>$discount_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Cart');
		return $STMT->fetch();
	}

	

    public function getAllItems($order_id){
		$SQL = "SELECT * FROM order_item WHERE order_id=:order_id ORDER BY order_id DESC";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['order_id'=>$order_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Cart');
		return $STMT->fetchAll();
	}
	
	public function insertCart(){
		$SQL = "INSERT INTO orders (user_id) VALUES (:user_id)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id'=>$this->user_id,
						]);
	}

	public function insertProduct(){
		$SQL = "INSERT INTO order_item (order_id, product_id, product_name, profile_id, quantity, sell_price, cost_price) VALUES (:order_id, :product_id, :product_name, :profile_id, :quantity, :sell_price, :cost_price)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['order_id'=>$this->order_id,
						'product_id'=>$this->product_id,
						'product_name'=>$this->product_name,
						'profile_id'=>$this->profile_id,
						'quantity'=>$this->quantity,
						'sell_price'=>$this->sell_price,
						'cost_price'=>$this->cost_price,
						]);
	}

	public function addDiscount(){
		$SQL = "UPDATE orders SET discount_id=:discount_id WHERE order_id=:order_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['discount_id'=>$this->discount_id,
						'order_id'=>$this->order_id,
					]);
	}

	public function updateQuantity(){
		$SQL = "UPDATE order_item SET quantity=:quantity WHERE order_item_id=:order_item_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['quantity'=>$this->quantity,
						'order_item_id'=>$this->order_item_id,]);
	}

	public function deleteProduct(){
		$SQL = "DELETE FROM order_item WHERE order_item_id=:order_item_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['order_item_id'=>$this->order_item_id]);
	}

	public function checkout(){
		$SQL = "UPDATE orders SET order_date=:order_date, total_price=:total_price, status=:status, shipping_info=:shipping_info WHERE order_id=:order_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['order_date'=>$this->order_date,
						'total_price'=>$this->total_price,
						'status'=>$this->status,
						'shipping_info'=>$this->shipping_info,
						'order_id'=>$this->order_id,]);
	}

	public function shipOrder(){
		$SQL = "UPDATE order_item SET ship_date=:ship_date WHERE order_item_id=:order_item_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['ship_date'=>$this->ship_date,
						'order_item_id'=>$this->order_item_id,]);
	}

	public function updateStatus(){
		$SQL = "UPDATE orders SET status=:status WHERE order_id=:order_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['status'=>$this->status,
						'order_id'=>$this->order_id,
					]);
	}	
	

	// public function getCompleteOrders($profile_id){
	// 	$SQL = "SELECT * FROM order_item,order WHERE order_id=:order_id ORDER BY order_id DESC";
	// 	$STMT = self::$_connection->prepare($SQL);
	// 	$STMT->execute(['order_id'=>$order_id]);
	// 	$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Cart');
	// 	return $STMT->fetchAll();
	// }

	public function getPaidOrders($profile_id){
		$SQL = "SELECT *
				FROM orders AS ORD 
				LEFT JOIN order_item AS ITM 
				ON ORD.order_id = ITM.order_id
				WHERE ORD.status LIKE 'Paid'
				AND ITM.profile_id=:profile_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$profile_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Cart');
		return $STMT->fetchAll();	
	}

	public function getMyOrders($user_id){
		$SQL = "SELECT *
				FROM orders AS ORD 
				LEFT JOIN order_item AS ITM 
				ON ORD.order_id = ITM.order_id
				WHERE ORD.status NOT LIKE 'Incomplete'
				AND ORD.user_id=:user_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id'=>$user_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Cart');
		return $STMT->fetchAll();	
	}

	// This method gets all complete orders except Incomplete or Canceled ones.
	public function getAllOrdersID(){
		$SQL = "SELECT order_item_id 
				FROM orders AS ORD 
				LEFT JOIN order_item AS ITM 
				ON ORD.order_id = ITM.order_id
				WHERE ORD.status NOT LIKE 'Incomplete'
				AND ORD.status NOT LIKE 'Canceled'";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Cart');
		return $STMT->fetchAll();	
	}

}