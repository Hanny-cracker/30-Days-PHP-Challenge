<?php
use Core\App;

$db = App::resolve(Database::class);

$currentUser_id = getId($db);

$query = "SELECT * FROM notes WHERE  id = :id";

$note = $db->query($query, [':id' => $_GET['id']])->findOrFial();

authorize($note['user_id'] == $currentUser_id['id']);


view("notes/edit.view.php", [
    'heading' => 'Edit note',
    'error' => [],
    'note' => $note
]);
