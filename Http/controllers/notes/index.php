<?php
use Core\App;

$db = App::resolve(Database::class);

$query = "SELECT * FROM notes ";

$notes = $db->query($query)->fetchAll();

view("notes/index.view.php",[
    'heading' => 'My Notes',
    'notes' => $notes
]);