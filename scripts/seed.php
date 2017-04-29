<?php
$config = json_decode(file_get_contents("config/db.json"), true);
try {
  $db = new PDO(
    "mysql:dbname=".$config['db'].";host=".$config['host'],
    $config['user'], $config['password']);
  $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

  $table="categories";
  $sql ="CREATE TABLE IF NOT EXISTS $table(
    ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR( 255 ) NOT NULL, 
    description TEXT NOT NULL,
    image VARCHAR( 255 ) NOT NULL);";
  $db->exec($sql);
  print("Created $table Table.\n");

} catch(PDOException $e) {
  echo $e->getMessage();//Remove or change message in production code
}

echo "\n";
?>
