<section class="order">
	<?php if($orderId>0):?>
	  <h2>Thank you</h2>
	  <p>Your order number is <?= $orderId ?>.</p>
	<?php else: ?>
	  <h2>Sorry</h2>
	  <p>Something went wrong and the order was not placed.</p>
	<?php endif; ?>
	  <p><a href="index.php">Back to the home page</a></p>
</section>
