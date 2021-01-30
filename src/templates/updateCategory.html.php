<div class="col-lg-6">
  <h1>Update Category</h1>
  <form action="updateCategory.php" method="post">
    <table>
      <tr>
        <th>Category Name</th>
        <th>Edit</th>
      </tr>
      <?php foreach ($categoryRows as $row):
        $categoryName = $row["category_name"];
        $categoryId = $row["category_id"];
      ?>
      <tr>
        <td><?= $categoryName ?></td>
        <td><a class="btn btn-default" href="updateCategory.php?id=<?= $categoryId ?>">Edit</a></td>
      </tr>
      <?php endforeach; ?>
      
      <?php
        if(count($rows) > 0):
        $row = $rows[0];
      ?>
      <tr class="edit-category">
        <td>
          <input class="form-control" type="text" name="CategoryName" id="CategoryName" required value="<?=
          $row["category_name"] ?>">
          <input type="hidden" value="<?= $row["category_id"] ?> " name="CategoryId">
        </td>
        <td><input class="update btn btn-default" type="submit" name="submit" value="Update Category"></td>
      </tr>
    <?php else: ?>
      <tr class="edit-category">
        <td>
          No category was supplied
        </td>
        <td></td>
      </tr>
    <?php endif; ?>
    </table>
    <p><?= $message ?></p>
  </form>
</div>

