<?php

use Core\App;
use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm(['email' => $email, 'password' => $password]);

if ($form->validate(['email' => $email, 'password' => $password])) {
    $db = App::resolve(Database::class);

    $user = $db->query('SELECT * FROM user WHERE email = :email', [
        'email' => $email
    ])->fetch();

    if ($user) {

        $form->error('email', 'Email already exist.');

    } else {

        $db->query('INSERT INTO user (email, password) VALUE(:email, :password)', [
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT)
        ]);
        
        (new Authenticator)->login(['email' => $email]);
        redirect('/');
    }
}
return view('registration/create.view.php', [
    'error' => $form->errors()
]);
