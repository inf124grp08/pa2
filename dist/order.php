<? include 'db.php'; ?>
<!DOCTYPE html>
<html>
  <? $title = "Thanks for your order"; ?>
  <? include 'head.php'; ?>
	<body>
    <div id="content">
      <? include 'navbar.php'; ?>

      <? if (count($errors) > 0): ?>
        <? foreach($errors as $error): ?>
          <p class="error"><?= $error ?></p>
        <? endforeach; ?>
      <? else: ?>
        <p>Order Number: <?= $id ?></p>
        <p>Order For: <?= $values[':firstname'] ?>  <?= $values[':lastname'] ?></p>
        <p>Product ID: <?= $values[':product_id'] ?></p>
        <p>Quantity: <?= $values[':quantity'] ?></p>
        <p>Phone Number: <?= $values[':phone'] ?></p>
        <p>Shipping Address: <pre><?= $values[':shipping'] . "<br>" . $values[':address']   ?></pre></p>
        <p>Credit Card: <?= $values[':creditcard'] ?></p>
        <p>Expiration Date: <?= $values[':expiry'] ?></p>
      <? endif; ?>
    </div>
	</body>
</html>
