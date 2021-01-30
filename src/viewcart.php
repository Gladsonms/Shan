<?php
	require_once "classes/Item.php";
	require_once "classes/ShoppingCart.php";
	session_start();
  $title = "Shopping cart";
  
	//create a category object
	$item = new Item();
	$message = "";

	//add item to shopping cart
	if(isset($_POST["buy"])) {
		//check item id and qty are not empty
		if(!empty($_POST["productId"]) && !empty($_POST["qty"])) {
		$productId = $_POST["productId"];
		$qty = $_POST["qty"];
		$img = $_POST["photoPath"];
		//get the item details
		$item->getitem($productId);
		//create a new cart item so it can be added to the shopping cart
		$item = new CartItem($item->getitemName(), $qty, $item->getPrice(),
		$productId, $img);
		//check if shopping cart exists
		if(!isset($_SESSION["cart"])) {
			//if shopping cart is not set create a new empty shopping cart
			$cart = new ShoppingCart();
		}
		else {
			//read shopping cart from session
			$cart = $_SESSION["cart"];
		}
		//add item to shopping cart
		$cart->addItem($item);
		//save shopping cart back into session
		$_SESSION["cart"] = $cart;
		}
	}

	//remove item from shopping cart
	if(isset($_POST["remove"])) {
		//check item id was supplied and cart exists in session
		if(!empty($_POST["productId"]) && isset($_SESSION["cart"])) {
			$productId = $_POST["productId"];
			//create a new cart item so it can be removed from the shopping cart
			//the only value that is important is the product Id
			$item = new CartItem("", 0, 0, $productId, "");
			//read shopping cart from session
			$cart = $_SESSION["cart"];
			//remove item from shopping cart
			$cart->removeItem($item);
			//save shopping cart back into session
			$_SESSION["cart"] = $cart;
		}
	}

	//update cart item qty
	if(isset($_POST["update"])) {
		//check item id was supplied and cart exists in session
		if(!empty($_POST["productId"]) && isset($_SESSION["cart"])) {
			$productId = $_POST["productId"];
			$productQty = $_POST["productQty"];
			//create a new cart item so it can be updated
			//the value that is important are the product Id and qty
			$item = new CartItem("", $productQty, 0, $productId, "");
			//read shopping cart from session
			$cart = $_SESSION["cart"];
			//update item
			if($productQty>0) {
				$cart->updateCart($item);
			} else {
				$cart->removeItem($item);
			}
			//save shopping cart back into session
			$_SESSION["cart"] = $cart;
		}
	}

	//start buffer
	ob_start();

  //display confirmation
  include "templates/cart.html.php";

  $output = ob_get_clean();

  include "templates/cart-layout.html.php"
?>
