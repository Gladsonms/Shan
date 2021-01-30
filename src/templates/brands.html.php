<!-- There are brands -->
<div class="brands">
  <h2>Brands and Partnerships</h2>
    <ul class="brand-tiles">
      <?php foreach ($rows as $row):
        $brandId = $row["brand_id"];
        $brandName = $row["brand_name"];
        $photoPath = "images/brands/" . $row["brand_photo"];     
      ?>
      <li class="two-column">
        <a title="<?= $brandName ?>" href="groupByBrands.php?id=<?= $brandId ?>">
          <img src="<?= $photoPath ?>" alt="<?= $brandName ?>" height="100" width="100">
        </a>
        <br>
        <a class="brandname" title="<?= $brandName ?>" href="groupByBrands.php?id=<?= $brandId ?>"><?= $brandName ?></a>
      </li>
      <?php endforeach; ?>
    </ul>
</div>
