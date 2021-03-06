<? include 'db.php'; ?>
<!DOCTYPE html>
<html>
  <? $title = $product['description'] ?>
  <? include 'head.php'; ?>
	<body>
    <div id="content">
      <? include 'navbar.php'; ?>
      <h2><?= $product['description'] ?></h2>
      <div id="product">
        <div id="product-info">
          <img class="product-image" src="<?= $product['image'] ?>"/>
          <div>
            <h3 class="brand"><strong>Brand: </strong><?= $product['brand'] ?></h3>
            <h4 class="price"><strong>Price: </strong><span id="price"><?= $product['price'] ?></span></h4>
          </div>
        </div>
        <div id="order-form">
          <form id="form-order-form" action="order.php" method="POST">
            <input name="subject" type="text" value="ORDER" class="hidden"/>
            <h4> Product ID: </h4>
            <input name="product-id" type="number" value="<?= $product['id'] ?>" required/>
            <h4> Quantity: </h4>
            <input name="quantity" type="number" value="1" id="qty" required/>
            <h4> First Name: </h4>
            <input name="firstname" type="text" required/>
            <h4> Last Name: </h4>
            <input name="lastname" type="text" required/>
            <h4> Phone Number: </h4>
            <input name="phone-number" type="tel" required/>
            <h4>Shipping Address: </h4>
            <input placeholder="street address" name="street" required/>
            <input placeholder="zip code" name="zip" id="zip" required/>
            <input placeholder="city" name="city" id="city" required/>
            <input placeholder="state" name="state" id="state" required/>
            <h4>Shipping Method: </h4>
            <input name="shipping" type="radio" value="overnight" required/><span>overnight</span><br>
            <input name="shipping" type="radio" value="2-days expedited"/><span>2-days expedited</span><br>
            <input name="shipping" type="radio" checked value="6-days ground"/><span>6-days ground</span><br>
            <br>
            <h4>Creditcard Number: <img id="cc-logo" style="height: 35px;" /> </h4>
            <input type="hidden" name="cc"/>
            <input type="number" min="0" max="9999" name="creditCard1" id="cc1" class="cc-input" required/>
            -
            <input type="number" min="0" max="9999" name="creditCard2" class="cc-input" required/>
            -
            <input type="number" min="0" max="9999" name="creditCard3" class="cc-input" required/>
            -
            <input type="number" min="0" max="9999" name="creditCard4" class="cc-input" required/>
            
            <br>
            <br>
            <h4>Expiration Date: </h4>
            <input class="inputCard" name="expiry" id="expiry" type="month" value="2018-01"  required/>
            <br>
            <h4>Subtotal: $<span id="subtotal"><?= $product['price'] ?></span></h4>
            <h4>Tax: %<span id="tax">0.00</span></h4>
            <h4>Total: $<span id="total"><?= $product['price'] ?></span></h4>
            <input type="submit" value="order" />
          </form>
          <script src="js/mail-order-form.js"></script>
        </div>
      </div>
    </div>
	</body>
</html>
