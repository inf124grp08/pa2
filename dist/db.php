<?php 

$config = json_decode(file_get_contents("../config/db.json"), true);

try {
  $db = new PDO(
    "mysql:dbname=".$config['db'].";host=".$config['host'],
    $config['user'], $config['password']);
  $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

  $sql = "SELECT * FROM categories;";

  $cur = $db->query($sql);

  $categories = $cur->fetchAll();

  $page = basename($_SERVER['PHP_SELF']);

  if ($page == "category.php") {
    if (isset($_GET["name"]) ) {
      $sql = "SELECT * FROM categories WHERE name = :name";
      $stmt = $db->prepare($sql);
      $stmt->execute(array(':name' => $_GET['name']));
      $category = $stmt->fetch();
      $label = $category['label'];
      $desc = $category['description'];
      $image = $category['image'];

      $sql = "SELECT * FROM products WHERE category_id = :name";
      $stmt = $db->prepare($sql);
      $stmt->execute(array(':name' => $_GET['name']));
      $products = $stmt->fetchAll();

    }
  } else if ($page == "product.php") {

  }

} catch(PDOException $e) {
  echo $e->getMessage();//Remove or change message in production code
}

$db = null;
?>
