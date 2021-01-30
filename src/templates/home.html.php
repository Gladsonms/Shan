<!-- This is the slideshow -->
<div class="slideshow" id="slideshow">
  <figure class="slide showing">
    <img src="images/slideshow/sports-balls.png" width="851" height="300" alt="Sports balls">
    <figcaption  class="indication">
      <p>View our brand <br>new range of</p>
      <p>Sports <br>balls</p>
      <a href="groupByCategories.php?id=5"><p>Shop now</p></a>
    </figcaption>
  </figure>
  <figure class="slide">
    <img src="images/slideshow/protective-helmets.png" width="851" height="300" alt="Protective helmets">
    <figcaption class="indication">
      <p>Get protected with <br>the new range of</p>
      <p>Protective <br>helmets</p>
      <a href="groupByCategories.php?id=2"><p>Shop now</p></a>
    </figcaption>
  </figure>
  <figure class="slide">
    <img src="images/slideshow/training-gear.png" width="851" height="300" alt="Train gear">
    <figcaption class="indication">
      <p>Get ready to race <br>with our professional</p>
      <p>Training <br>gear</p>
      <a href="groupByCategories.php?id=7"><p>Shop now</p></a>
    </figcaption>
  </figure>
  <!-- slide nav dots -->
  <ul class="nav-dots" id="nav-dots">
    <li class="nav-dot" id="slide1"></li>
    <li class="nav-dot" id="slide2"></li>
    <li class="nav-dot" id="slide3"></li>
  </ul>
</div>
<!-- This is the content -->
<section class="products">
  <h2>Feature products</h2> 
  <div class="turn-left" id="turn-left">
    <span class="arrow-left"></span>
  </div>
  <div class="feature-products clearfix" id="feature-products">  
    <div class="show-feature-products" id="show-feature-products">
      <!-- feature products PHP code-->            
      <?php foreach ($rows as $row): 
        $photoPath = "images/products/image-unavailable.jpg";
        if (file_exists("images/products/".$row["item_photo"]) && strlen($row["item_photo"]) > 0) {
          $photoPath = "images/products/" .$row["item_photo"];
        }    
        $productName = $row["item_name"]; 
        $unitPrice = sprintf("%1.2f", $row["item_price"]);  
        $salePrice = sprintf("%1.2f", $row["item_saleprice"]); 
        $productId = $row["item_id"];  
      ?> 
      <a href="viewitem.php?id=<?= $productId ?>">
        <figure class="items">
          <div class="item-image">
            <img src="<?= $photoPath ?>" alt="<?= $productName ?>">
          </div>
          <figcaption>
            <div class="finalprice">
              <span class="current">&#36;<?= $salePrice ?> 
              <?php 
                if ($unitPrice != $salePrice) {
                echo "<span class='wrap'>was <b class='original'>&#36;$unitPrice</b></span>";
                } 
              ?>
              </span> 
            </div>
            <p><?= $productName ?></p>
          </figcaption>                   
        </figure>
      </a>    
      <?php endforeach;?>
    </div>   
  </div>
  <div class="turn-right" id="turn-right">
    <span class="arrow-right"></span>
  </div> 
</section>
<section class="brandslogo">
  <h2>Our brands and partnerships</h2>
  <p>These are some of our top brands and partnerships.<br><a href="brands.php">The best of the best is here.</a></p>
  <div class="partnerships">
    <div class="brand-img">
      <img src="images/logos/logo_nike.png" alt="nike logo">
    </div>
    <div class="brand-img">
      <img src="images/logos/logo_adidas.png" alt="adidas logo">
    </div>
    <div class="brand-img">
      <img src="images/logos/logo_skins.png" alt="skins logo">
    </div>
    <div class="brand-img">
      <img src="images/logos/logo_asics.png" alt="asics logo">
    </div>
    <div class="brand-img">
      <img src="images/logos/logo_newbalance.png" alt="newbalance logo">
    </div>
    <div class="brand-img">
      <img src="images/logos/logo_wilson.png" alt="wilson logo">
    </div>
  </div>
</section>
