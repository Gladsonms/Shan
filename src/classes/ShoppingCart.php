<?php
	require_once "CartItem.php";
	require_once "DBAccess.php";
	class ShoppingCart {
		private $_cartItems = [];
		private $_shoppingOrderId;
		public function count() {
			return count($this->_cartItems);
		}

		public function setShoppingOrderId($Id) {
			$this->_shoppingOrderId = (int)$Id;
		}

		public function getItems() {
			return $this->_cartItems;
		}

		//add item to cart
		public function addItem($cartItem) {
			//if cartItem already exists update quatity
			$found = $this->inCart($cartItem);
			if($found != null) {
				//update quantity
				$this->updateItem($cartItem);
			}
			else {
				//insert new cart item
				$this->_cartItems[] = $cartItem;
			}
		}

		//update quantity
		public function updateItem($cartItem) {
			$index = $this->itemIndex($cartItem);
			//get current quantity
			$oldQty = $this->_cartItems[$index]->getQuantity();
			$additionalQty = $cartItem->getQuantity();
			//calculate new quantity
			$newQty = $oldQty + $additionalQty;
			//update cart item with new quatity
			$this->_cartItems[$index]->setQuantity($newQty);
		}

		//update cart
		public function updateCart($cartItem) {
			$index = $this->itemIndex($cartItem);
			//get current quantity
			$newQty = $cartItem->getQuantity();
			//update cart item with new quatity
			$this->_cartItems[$index]->setQuantity($newQty);
		}

		//remove item
		public function removeItem($cartItem) {
			// $index = array_search($cartItem, $this->_cartItems);
			$index = $this->itemIndex($cartItem);
			if($index >= 0) {
				//remove array element
				unset($this->_cartItems[$index]);
				//reorganise values
				$this->_cartItems = array_values($this->_cartItems);
			}
		}

		//calculate qty
		public function calculateQty() {
			$total = 0.0;
			foreach ($this->_cartItems as $item) {
				$total += $item->getQuantity();
			}
			return $total;
		}

		//calculate total
		public function calculateTotal() {
			$total = 0.0;
			foreach ($this->_cartItems as $item) {
				$total += $item->getQuantity() * $item->getPrice();
			}
			return $total;
		}

		//save cart
		public function saveCart($Address, $ContactNumber, $CreditCardNumber, $CSV, $Email,
		$ExpiryDate, $FirstName, $LastName, $NameOnCard) {
			//database setup and connect
			include "settings/db.php";
			$db=new DBAccess($dsn, $username, $password);
			$pdo = $db->connect();
			//set up SQL statement to insert order
			$sql = "insert into shoppingorder(Address, ContactNumber, CreditCardNumber, CSV,
			Email, ExpiryDate, FirstName, LastName, NameOnCard, OrderDate) values(:Address, 
			:ContactNumber, :CreditCardNumber, :CSV, :Email, :ExpiryDate, :FirstName, :LastName,
			:NameOnCard, curdate())";
			$stmt = $pdo->prepare($sql);
			$stmt->bindValue(":Address" , $Address, PDO::PARAM_STR);
			$stmt->bindValue(":ContactNumber" , $ContactNumber, PDO::PARAM_STR);
			$stmt->bindValue(":CreditCardNumber" , $CreditCardNumber, PDO::PARAM_STR);
			$stmt->bindValue(":CSV" , $CSV, PDO::PARAM_STR);
			$stmt->bindValue(":Email" , $Email, PDO::PARAM_STR);
			$stmt->bindValue(":ExpiryDate" , $ExpiryDate, PDO::PARAM_STR);
			$stmt->bindValue(":FirstName" , $FirstName, PDO::PARAM_STR);
			$stmt->bindValue(":LastName" , $LastName, PDO::PARAM_STR);
			$stmt->bindValue(":NameOnCard" , $NameOnCard, PDO::PARAM_STR);
			$shoppingOrderId = $db->executeNonQuery($stmt, true);
			//loop through shopping cart, insert items
			foreach ($this->_cartItems as $item) {
				//set up insert statement
				$sql = "insert into orderitem(item_id, Price, Quantity, shoppingOrderId, user_id)
				values(:item_id, :Price, :Quantity, :shoppingOrderId, :user_id)";
				//for each item insert a row in OrderItem
				$stmt = $pdo->prepare($sql);
				$stmt->bindValue(":item_id" , $item->getItemId(), PDO::PARAM_INT);
				$stmt->bindValue(":Price" , $item->getPrice(), PDO::PARAM_STR);
				$stmt->bindValue(":Quantity" , $item->getQuantity(), PDO::PARAM_INT);
				$stmt->bindValue(":shoppingOrderId" , $shoppingOrderId, PDO::PARAM_INT);
				if(isset($_SESSION["user_id"])){
					$stmt->bindValue(":user_id" , $_SESSION["user_id"], PDO::PARAM_INT);
				} else {
					$stmt->bindValue(":user_id" , null, PDO::PARAM_INT);
				}
				$db->executeNonQuery($stmt);
			}
			return $shoppingOrderId;
		}

		private function inCart($cartItem) {
			$found = null;
			foreach($this->_cartItems as $item) {
				if ($item->getItemId() == $cartItem->getItemId() ) {
					$found = $item;
				}
			}
			return $found;
		}

		private function itemIndex($cartItem) {
			$index = -1;
			for($i=0; $i<$this->count(); $i++) {
				if($cartItem->getItemId() == $this->_cartItems[$i]->getItemId()) {
					$index = $i;
				}
			}
			return $index;
		}
		//display array testing purposes
		public function displayArray() {
			print_r($this->_cartItems);
		}
	}
?>
