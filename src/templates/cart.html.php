<?php 
  if(isset($_SESSION["cart"])):
  $cart = $_SESSION["cart"];
  $cartItems = $cart->getItems();
    if($cart->calculateTotal()>0):
?>
    <h1 class="title">Cart</h1>
    <table class="table">
      <thead>
        <tr>
          <th class="pro-img"></th>
          <th class="pro-name">Item</th>
          <th class="pro-price">Price</th>
          <th class="pro-quantity">Qty</th>
          <th class="pro-update"></th> 
          <th class="pro-del"></th>          
        </tr>
      </thead>
      <?php 
      foreach($cartItems as $item):
        $productName = $item->getItemName();
        $price = sprintf('%01.2f', $item->getPrice());
        $productId = $item->getItemId();
        $qty = $item->getQuantity();
        $photoPath = $item->getItemImg();
      ?>
      <tbody>
        <tr>
          <td class="pro-img"><img src="<?= $photoPath ?>" alt="<?= $productName ?>"></td>
          <td class="pro-name"><?= $productName ?></td>
          <td class="pro-price">$<?= $price ?></td>
          <form action="viewcart.php" method="post">
            <td class="pro-quantity"><input type="number" value="<?= $qty ?>" name="productQty" class="pruducts-quantity"></td>
            <td class="pro-update">
              <button class='button' name="update">Update</button>
              <input type="hidden" value="<?= $productId ?>" name="productId">
            </form>
          </td>
          <td class="pro-del">
            <form action="viewcart.php" method="post">
              <button class='button' name="remove">Delete</button>
              <input type="hidden" value="<?= $productId ?>" name="productId">
            </form>
          </td>
        </tr>
      </tbody>
      <?php endforeach; ?>
    </table>
    <p class="total-price">Total: $<?= sprintf('%01.2f', $cart->calculateTotal()) ?></p>
    <div class="nav-item">
      <div class="field">
        <p class="control">
          <a href="checkout.php" class="button">
            <span class="icon">
              <i class="fa fa-shopping-cart"></i>
            </span>
            <span>Checkout (<?= sprintf($cart->calculateQty()) ?>)</span>
          </a>
        </p>
      </div>
    </div>
  <?php else: ?>
    <div class="empty">
      <i class="fa fa-shopping-cart fa-4x"></i>
      <p>Your shopping cart is currently empty.</p>
    </div>
  <?php endif; ?>
<?php else: ?>
<div class="empty">
<i class="fa fa-shopping-cart fa-4x"></i>
<p>Your shopping cart is currently empty.</p>
</div>
<?php endif; ?>
