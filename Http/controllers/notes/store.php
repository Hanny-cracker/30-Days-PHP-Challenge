<?php

use Core\App;

$db = App::resolve(Database::class);

$validator = new Validator();
$error = [];

$currentUser_id = getId($db);
$heading = "Create Note";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = [];
    if (!Validator::string($_POST['body'])) {
        $error['body'] = 'A body of atlest 100 is required';
    }
    if (empty($error)) {
        $db->query('INSERT INTO notes(body,user_id ) VALUE (:body , :currentUser_id)', [
            'body' => htmlspecialchars($_POST['body']),
            'currentUser_id' => $currentUser_id['id']
        ]);
        header('location: /index.php/notes');

        exit();
    }
}

view("notes/create.view.php", [
    'heading' => $heading,
    'error' => $error
]);