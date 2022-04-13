<?php include __DIR__ . "/../config.inc.php" ?>

<nav>
  <div class="title">
    <a href="/">
      <img src="https://i.scdn.co/image/ab67616d0000b2737d6ac8b4a84ad4b342050d87" />
      <?php echo $CONFIG['site_name'] ?>
    </a>
  </div>
  <div class="links">
    <a href='/tour'>Tour</a>
    <a href='/songs'>Songs</a>
    <a href='/aboutme'>About Me</a>
    <form action="<?= "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}" ?>" method="POST">
      <?php
      if ($_COOKIE['language'] == 'en') {
        echo "<input type='hidden' name='nl'>";
        echo "<input type='image' height='24' src='https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/Flag_of_the_Netherlands.svg/255px-Flag_of_the_Netherlands.svg.png'>";
      } else {
        echo "<input type='hidden' name='en'>";
        echo "<input type='image' height='24' src='https://upload.wikimedia.org/wikipedia/commons/thumb/f/f2/Flag_of_Great_Britain_%281707%E2%80%931800%29.svg/2560px-Flag_of_Great_Britain_%281707%E2%80%931800%29.svg.png'>";
      }
      ?>
    </form>
  </div>
</nav>

<style>
  nav>.links>form {
    display: inline-block;
    vertical-align: middle;
    height: 24px;
    margin: auto;
  }

  nav>.links>form>input[type="image"] {
    display: inline-block;
    vertical-align: middle;
    height: 24px;
  }
</style>
