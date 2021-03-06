<? include 'db.php'; ?>
<!DOCTYPE html>
<html>
  <? $title = "Maximum Climbing: ".$category['label'] ?>
  <? include 'head.php'; ?>
	<body>
    <div id="content">
      <? include 'navbar.php'; ?>
      <h2><?= $category['label'] ?></h2>
      <img class="cat-image" src="<?= $category['image'] ?>"/>
      <p><?= $category['description'] ?></p>
      <table id="cat-table">
        <thead id="cat-table-labels">
          <tr>
            <th>Image</th>
            <th>Description</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody id="cat-table-body">
        <? foreach($products as $p): ?>
          <tr class="cat-table-row">
            <td class="cat-table-image">
              <a href="product.php?id=<?= $p['id'] ?>">
                <img class="product-image" src="<?= $p['image'] ?>"/>
              </a>
            </td>
            <td class="cat-table-description">
              <a href="product.php?id=<?= $p['id'] ?>">
                <p><?= $p['description'] ?></p>
                <p><strong>brand: </strong><?= $p['brand'] ?></p>
              </a>
            </td>
            <td class="cat-table-price">
              $<?= $p['price'] ?>
            </td>
          </tr>
        <? endforeach ?>
        </tbody>
      </table>
    </div>
	</body>
</html>
