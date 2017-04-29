<div id="nav-bar">
  <ul>
    <li class="cat-nav-item">
    <a href="index.php">Home</a>
    </li>
    <? foreach($categories as $cat): ?>
      <li class="cat-nav-item">
      <a href="category.php?name=<?= $cat['name']; ?>"><?= $cat['label']; ?></a>
      </li>
    <? endforeach ?>
  </ul>
</div>
