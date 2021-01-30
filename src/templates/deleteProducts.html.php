<div class="col-lg-6">
  <h1>Delete Product</h1>
  <p><?= $message ?></p>
    <table>
      <tr>
        <th></th>
        <th>Product Name</th>
        <th>Delete</th>
      </tr>

      <?php foreach ($productRows as $row):
        //set up the generic image file
        $photoPath = "images/products/image-unavailable.jpg";
        //check if the image file exists
        if (file_exists("images/products/".$row["item_photo"]) && strlen($row["item_photo"]) > 0) {
          $photoPath = "images/products/" .$row["item_photo"];
          $photoToDelete = $row["item_photo"];
        } else {
          $photoToDelete = "none";
        }
        $productId = $row["item_id"];
        $productName = $row["item_name"];
      ?>

      <tr>
        <td><img class="thumbnail img-responsive" src="<?= $photoPath ?>" alt="Photo of employee"></th>
        <td><?= $productName ?></th>
        <td><a class="delete btn btn-default" href="deleteProduct.php?id=<?= $productId ?>&photo=<?= $photoToDelete ?>">Delete Product</a></th>
      </tr>
      <?php endforeach; ?>
    </table>
</div>

