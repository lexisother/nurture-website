<?php
includeWithVariables(__DIR__ . '/../templates/base.php', ['pageTitle' => 'Projects']);
$title = "Projects";
$description = "This is a list of (almost) all of my GitHub projects.";


// Sort the repositories by their `updated_at` date, latest first
// usort($repositories, function ($a, $b) {
//   $date1 = strtotime($a['updated_at']);
//   $date2 = strtotime($b['updated_at']);
//   return $date2 - $date1;
// });
?>

<!-- Might be worth converting this into a `page` component/template. -->
<div class="projects-page">
  <div class="header">
    <div class="title"><?= $title ?></div>
    <div class="desc"><?= $description ?></div>
  </div>
  <?php
  foreach ($repositories as $repo) {
  ?>
    <div class="list-item">
      <div class="name"><a href="<?= $repo['html_url'] ?>"><?= $repo['name'] ?></a></div>
      <div class="description"><?= $repo['description'] ?></div>
      <div class="info">
        <div class="label">
          <?= $repo['language'] ?>
        </div>
        <?php
        if (isset($repo['license']['name'])) {
        ?>
          <div class="label">
            <a href="https://choosealicense.com/licenses/<?= strtolower($repo['license']['spdx_id']) ?>">
              <?= $repo['license']['name'] ?>
            </a>
          </div>
        <?php
        }
        ?>

      </div>
    </div>
  <?php
  }
  ?>
</div>
