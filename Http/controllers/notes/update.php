<?php
use Core\App;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUser_id = getId($db);

$query = "SELECT * FROM notes WHERE  id = :id";

$note = $db->query($query, [':id' => $_POST['id']])->findOrFial();

authorize($note['user_id'] == $currentUser_id['id']);

$error = [];
if (!Validator::string($_POST['body'])) {
    $error['body'] = 'A body of atlest 100 is required';
} 

if(count($error)){
    return view('notes/edit.php',[
        'heading'=>'Edit Note',
        'error' => $error,
        'note' => $note
    ]);
}

$db->query('UPDATE notes set body = :body where id=:id',[
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);

header('location: /index.php/notes');

exit();
