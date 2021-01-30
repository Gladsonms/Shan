<div class="show-products clearfix">
	<?php foreach ($rows as $row):?>
	<h2><?= $row["category_name"] ?></h2>
	<?php 
		break;
		endforeach;
	?>	
	<div class="search-products clearfix">
		<?php foreach ($rows as $row): 
			$photoPath = "images/products/image-unavailable.jpg";
	    if (file_exists("images/products/".$row["item_photo"]) && strlen($row["item_photo"]) > 0) {
	      $photoPath = "images/products/" .$row["item_photo"];
	    }    
			$productName = $row["item_name"];   
			$salePrice = sprintf("%1.2f", $row["item_saleprice"]); 
			$productId = $row["item_id"]; 
	    $unitPrice = sprintf("%1.2f", $row["item_price"]);   
		?> 
		<div class="item">
			<a href="viewitem.php?id=<?= $productId ?>" class="product-link clearfix">
			  <figure class="items">
			    <div class="item-image">
			      <img src="<?= $photoPath ?>" alt="<?= $productName ?>">
			    </div>
			    <figcaption>
			      <div class="finalprice">
							<span class="price">&#36;<?= $salePrice ?></span>
							<?php 
								if ($unitPrice != $salePrice) {
			 						echo "<b class='orignial'>&#36;$unitPrice</b>";
			 					} 
							?>	
						</div>
						<p>
				      <?= $productName ?>
				    </p>
				  </figcaption>
			  </figure>
			</a>
			<form action="viewcart.php" method="post">
				<button class="addtocart" type="submit" name="buy">
					Add to Cart
				</button>
		    <input type="hidden" value="1" name="qty">
        <input type="hidden" value="<?=$photoPath?>" name="photoPath">
				<input type="hidden" value="<?=$productId?>" name="productId">
			</form>
		</div>
		<?php endforeach;?>
	</div> 
</div>
