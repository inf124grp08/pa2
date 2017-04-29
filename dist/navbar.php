<div id="nav-bar">
  <ul>
    <li class="cat-nav-item">
    <a href="index.html">Home</a>
    </li>
    <? foreach($categories as $cat): ?>
      <li class="cat-nav-item">
      <a href="category-<?= $cat['name']; ?>.html"><?= $cat['label']; ?></a>
      </li>
    <? endforeach ?>
  </ul>
</div>
