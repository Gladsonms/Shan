<?php
class CartItem {
	private $_itemName;
	private $_quantity;
	private $_price;
	private $_itemId;
	private $_itemImg;

	//constructor
	public function __construct($itemName, $quantity, $price, $itemId, $itemImg) {
		$this->_itemName = $itemName;
		$this->_quantity = (int)$quantity;
		$this->_price = (float)$price;
		$this->_itemId = (int)$itemId;
		$this->_itemImg = $itemImg;
	}

	//get quantity
	public function getQuantity() {
		return $this->_quantity;
	}
	//set quantity
	public function setQuantity($value) {
		if($value >= 0) {
			$this->_quantity = (int)$value;
		}
		else {
			throw new Exception("Quantity must be positive");
		}
	}

	//get price
	public function getPrice() {
		return $this->_price;
	}
	//get Item Id
	public function getItemId() {
		return $this->_itemId;
	}
	//get Item name
	public function getItemName() {
		return $this->_itemName;
	}
	//get Item image
	public function getItemImg() {
		return $this->_itemImg;
	}
}
?>
