<?php
$heading = "My Note";

use Core\App;

$db = App::resolve(Database::class);

$currentUser_id = getId($db);

$query = "SELECT * FROM notes WHERE  id = :id";

$note = $db->query($query, [':id' => $_GET['id']])->findOrFial();

authorize($note['user_id'] == $currentUser_id['id']);

view("notes/show.view.php", [
    'heading' => $heading,
    'note' => $note
]);
