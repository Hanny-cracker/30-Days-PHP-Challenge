<?php require 'partials/header.php'; ?>
<?php require 'partials/nav.php'; ?>
<?php require 'partials/banner.php'; ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <p>Hello <?=  strstr(($_SESSION['user']['email'] ?? "Guest@"),"@",true)  ?>. Welcome to the <?= $heading ?></p>
  </div>
</main>

<?php require 'partials/footer.php' ?>