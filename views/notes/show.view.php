<?php require __DIR__ . '/../partials/header.php'; ?>
<?php require __DIR__ . '/../partials/nav.php'; ?>
<?php require __DIR__ . '/../partials/banner.php'; ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <b class="mb-6">
      <a href="/index.php/notes" class="text-blue-500 underline">go back...</a>
    </b>
    <p>
      <?= htmlspecialchars($note['body'])  ?>
    </p>
    <footer class="mt-6 flex gap-x-1">
      <a href="/index.php/note/edit?id=<?= $note['id'] ?>" class="rounded-md bg-gray-600 px-8 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</a>

      <form method="POST">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="id" value="<?= $note['id'] ?>">
        <button type="submit" class="rounded-md bg-red-600 px-8 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Delete</button>
      </form>
    </footer>
  </div>
</main>

<?php require __DIR__ . '/../partials/footer.php' ?>