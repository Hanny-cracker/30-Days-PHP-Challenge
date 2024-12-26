<?php

use Core\App;

$db = App::resolve(Database::class);


$currentUser_id = getId($db);

$query = "SELECT * FROM notes WHERE  id = :id";

$note = $db->query($query, [
    ':id' => $_POST['id']
])->findOrFial();

authorize($note['user_id'] == $currentUser_id['id']);

$db->query('DELETE FROM notes WHERE id=:id', [
    'id' => $_GET['id']
]);

header('location: /index.php/notes');

exit();
