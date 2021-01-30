<div class="col-lg-6">
  <h1>Insert Category</h1>
  <form action="insertProduct.php" method="post" enctype="multipart/form-data" role="form" id="insert-product">
    <div class="form-group">
      <label for="productName">Product Name:</label>
      <input class="form-control" type="text" name="productName" id="productName" required>
    </div>
    <div class="form-group">
      <label for="brand">Brand Name:</label>
      <select class="form-control" name="brand" id="brand">
        <?php foreach ($brandRows as $row):
        $brandId = $row["brand_id"];
        $brandName = $row["brand_name"];
        ?>
        <option value="<?= $brandId ?>"><?= $brandName ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label for="category">Category:</label>
      <select class="form-control" name="category" id="category">
        <?php foreach ($categoryRows as $row):
        $categoryName = $row["category_name"];
        $categoryId = $row["category_id"];
        ?>
        <option value="<?= $categoryId ?>"><?= $categoryName ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label for="itemPrice">Original Price: $</label>
      <input class="form-control" type="text" name="itemPrice" id="itemPrice" required>
    </div>
    <div class="form-group">
      <label for="salePrice">Sale Price: $</label>
      <input class="form-control" type="text" name="salePrice" id="salePrice" required>
    </div>
    <div class="form-group">
      <label for="description">Description: </label>
      <textarea class="form-control" rows="3" name="description" id="description" required></textarea>
    </div>
    <div class="form-group">
      <label for="featured">Featured Product: </label>
      <input type="checkbox" name="featured" id="featured">
    </div>
    <div class="form-group">
      <label for="imagePath">Product Image:</label>
      <input type="file" name="imagePath" id="imagePath">
    </div>
    <div class="form-group">
      <input class="insert btn btn-default" type="submit" value="Insert New Product" name="submit">
    </div>
    <p><?= $message ?></p>
  </form>
</div>

