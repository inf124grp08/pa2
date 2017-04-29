<?php
$config = json_decode(file_get_contents("config/db.json"), true);
$data = json_decode(file_get_contents("data.json"), true);
try {
  $db = new PDO(
    "mysql:dbname=".$config['db'].";host=".$config['host'],
    $config['user'], $config['password']);
  $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

  $table="categories";
  $db->exec("DROP TABLE IF EXISTS $table;");
  print("Dropped table $table if it existed.\n");

  $sql ="CREATE TABLE IF NOT EXISTS $table(
    name VARCHAR( 50 ) PRIMARY KEY,
    label VARCHAR( 255 ) NOT NULL, 
    description TEXT NOT NULL,
    image VARCHAR( 255 ) NOT NULL);";
  $db->exec($sql);
  print("Created table $table.\n");

  foreach ($data['categories'] as $name => $cat) {
    $label = $cat['label'];
    $desc = $cat['description'];
    $img = $cat['image'];
    $sql = "INSERT INTO $table (name, label, description, image) VALUES ('$name', '$label', '$desc', '$img')";
    $db->exec($sql);
  }

  $table="products";
  $db->exec("DROP TABLE IF EXISTS $table;");
  print("Dropped table $table if it existed.\n");

  $sql ="CREATE TABLE IF NOT EXISTS $table(
    id INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
    category_id VARCHAR( 50 ) NOT NULL,
    price numeric(15,2) NOT NULL, 
    brand VARCHAR( 50 ) NOT NULL,
    description TEXT NOT NULL,
    image VARCHAR( 255 ) NOT NULL);";
  $db->exec($sql);
  print("Created table $table.\n");

  foreach ($data['products'] as $prod) {
    $cat = $prod['category'];
    $desc = $prod['description'];
    $img = $prod['image'];
    $brand = $prod['brand'];
    $price = $prod['price'];
    $sql = "INSERT INTO $table (category_id, price, brand, description, image) VALUES ('$cat', '$price', \"$brand\", \"$desc\", '$img');";
    $db->exec($sql);
  }

  $table="orders";
  $db->exec("DROP TABLE IF EXISTS $table;");
  print("Dropped table $table if it existed.\n");
  $sql ="CREATE TABLE IF NOT EXISTS $table(
    id INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
    product_id INT( 11 ) NOT NULL,
    quantity INT(11) NOT NULL, 
    firstname VARCHAR( 255 ) NOT NULL,
    lastname VARCHAR( 255 ) NOT NULL,
    phone VARCHAR( 255 ) NOT NULL,
    address TEXT NOT NULL,
    shipping VARCHAR(50) NOT NULL,
    creditcard VARCHAR(255) NOT NULL,
    expiry VARCHAR(50) NOT NULL);";
  $db->exec($sql);
  print("Created table $table.\n");


} catch(PDOException $e) {
  echo $e->getMessage();//Remove or change message in production code
}

echo "\n";
?>
