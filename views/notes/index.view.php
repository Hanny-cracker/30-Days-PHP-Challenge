<?php require __DIR__.'/../partials/header.php'; ?>
<?php require __DIR__.'/../partials/nav.php'; ?>
<?php require __DIR__.'/../partials/banner.php'; ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
   <?php foreach ($notes as $note) :?>
   <ul>
      <li>
      <a href="/index.php/note?id=<?=$note['id']?>" class="text-blue-500 hover:underline">
         <?= htmlspecialchars($note['body']) ?>
      </a>
   </li>
   </ul>
    <?php endforeach; ?>
<p class="mt-10">
  <a href="/index.php/notes/create" class="text-blue-500 hover:underline">Create a Note</a>
</p>

  </div>
</main>

  <?php require __DIR__.'/../partials/footer.php' ?>