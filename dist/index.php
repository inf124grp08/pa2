<!DOCTYPE html>
<html>
  <? include 'head.php'; ?>
	<body>
    <div id="content">
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

} catch(PDOException $e) {
  echo $e->getMessage();//Remove or change message in production code
}

$db = null;

?>
      <? include 'navbar.php'; ?>

      <div id="title">
        <h1>Rock On</h1>
      </div>
        <div id="home-text">
          <p> 
            Rock On Climbing Gear is the number one seller of rock climing gear in the entire Informatics 124 class. We sell all the best most durable equiptment.
          </p>
          <p> 
            Our managment team is made up of two avid rock climbers, Keyvan and Kyle. These guys love to climb, and make sure that the gear on this site is top of the line.
          </p>
          <p> 
            Thank you for visiting our online store, we hope you will find what you are looking for!
          </p>
        </div>
    </div>
	</body>
</html>
