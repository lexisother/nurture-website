<?php include __DIR__ . "/../config.inc.php" ?>

<nav>
  <div class="title">
    <?php echo $CONFIG['site_name'] ?>
  </div>
  <div class="links">
    <?php
    foreach (range(1, 3) as $page) {
      echo "<a href='/{$page}'>test {$page}</a>";
    }
    ?>
  </div>
</nav>
