<div class="show-item clearfix">
	<?php foreach ($rows as $row): 
		$photoPath = "images/products/image-unavailable.jpg";
    if (file_exists("images/products/".$row["item_photo"]) && strlen($row["item_photo"]) > 0) {
      $photoPath = "images/products/" .$row["item_photo"];
    } 
		$productName = $row["item_name"];   
		$salePrice = sprintf("%1.2f", $row["item_saleprice"]); 
    $unitPrice = sprintf("%1.2f", $row["item_price"]);
    $productDescription =   $row["item_description"];
    $productId = $row["item_id"];
	?> 
	<h1><?= $productName ?></h1>
    <div class="item-pic" id="normal">
	    <img src="<?= $photoPath ?>" alt="<?= $productName ?>">
      <span id="lay"></span>
    </div>
    <div class="item-zoom" id="bigImg">
      <img src="<?= $photoPath ?>" alt="<?= $productName ?>">
    </div>
	<div class="item-info">
		<?php 
		if ($unitPrice != $salePrice) {
		 	echo "<h2>Original Price:</h2>";
		 	echo "<p class='price line-through'>&#36;$unitPrice</p>";
		 } 
		?>			
		<h2>Sale Price:</h2>
		<p class="price">&#36;<?= $salePrice ?></p>
		<h2>Product description:</h2>
		<p><?= $productDescription ?></p>
	</div>
	<form action="viewcart.php" method="post" class='add-to-cart-form'>
    <label for="qty<?=$productId?>">Quantity:</label>
    <input type="number" class="form-control m-b-10px cart-quantity" id="qty<?=$productId?>" name="qty" value="1" min="1" />
    <button class="add-btn" type="submit" name="buy" value="Buy">
      <i class="fas fa-shopping-cart white"></i>
      Add to Cart
	  </button>
    <input type="hidden" value="<?=$photoPath?>" name="photoPath">
    <input type="hidden" value="<?=$productId?>" name="productId">
  </form>
	<?php endforeach;?> 
</div>
