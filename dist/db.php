<?php 

$config = json_decode(file_get_contents("../config/db.json"), true);
$validators = json_decode(file_get_contents("./validators.json"), true);
$page = basename($_SERVER['PHP_SELF']);

try {
  $db = new PDO(
    "mysql:dbname=".$config['db'].";host=".$config['host'],
    $config['user'], $config['password']);
  $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

  $sql = "SELECT * FROM categories;";
  $cur = $db->query($sql);
  $categories = $cur->fetchAll();

  if ($page == "category.php") {
    if (isset($_GET["name"]) ) {
      $sql = "SELECT * FROM categories WHERE name = :name";
      $stmt = $db->prepare($sql);
      $stmt->execute(array(':name' => $_GET['name']));
      $category = $stmt->fetch();

      $sql = "SELECT * FROM products WHERE category_id = :name";
      $stmt = $db->prepare($sql);
      $stmt->execute(array(':name' => $_GET['name']));
      $products = $stmt->fetchAll();
    }
  } else if ($page == "product.php") {
    if (isset($_GET["id"]) ) {
      $sql = "SELECT * FROM products WHERE id = :id";
      $stmt = $db->prepare($sql);
      $stmt->execute(array(':id' => $_GET['id']));
      $product = $stmt->fetch();
    }
  } else if ($page == "order.php") {

    $errors = array();

    foreach($validators as $item) {
      $name = $item['name'];
      $regex = $item['regex'];
      $value = $_POST[$name];
      $result = preg_match("/$regex/", $value);
      if (!$result) {
        if (array_key_exists('message', $item)) {
          array_push($errors, $item[$message]);
        } else {
          array_push($errors, "$name is not valid");
        }
      }
    }

    if (count($errors) == 0) {
      $values = array(
        ':product_id' => $_POST['product-id'],
        ':quantity' => $_POST['quantity'],
        ':firstname' => $_POST['firstname'],
        ':lastname' => $_POST['lastname'],
        ':phone' => $_POST['phone-number'],
        ':address' => join('\n', array(
          $_POST['street'],
          join(', ', array(
            $_POST['city'],
            $_POST['state'],
            $_POST['zip']
          ))
        )),
        ':shipping' => $_POST['shipping'],
        ':creditcard' => join('-', array(
          $_POST['creditCard1'],
          $_POST['creditCard2'],
          $_POST['creditCard3'],
          $_POST['creditCard4']
        )),
        ':expiry' => $_POST['expiry']
      );

      $sql = "INSERT INTO orders (
        product_id,
        quantity,
        firstname,
        lastname,
        phone,
        address,
        shipping,
        creditcard,
        expiry
      ) VALUES (:product_id, :quantity, :firstname, :lastname, :phone, :address, :shipping, :creditcard, :expiry);";
      $stmt = $db->prepare($sql);
      $order = $stmt->execute($values);
      $id = $db->lastInsertId();
    }
  }

} catch(PDOException $e) {
  echo $e->getMessage();//Remove or change message in production code
}

$db = null;
?>
