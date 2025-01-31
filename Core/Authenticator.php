<?php

namespace Core;

use Core\App; 
use Core\Database;

class Authenticator
{
    public function attempt($email, $password)
    {
        $user = App::resolve(Database::class)
            ->query('SELECT * FROM user WHERE email = :email', [
                'email' => $email
            ])->fetch();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login([
                    'email' => $user['email']
                ]);

                return true;
            }
        }
        return false;
    }
 
    public function login($user) :bool
    {
        $_SESSION['user'] = [
            'email' => $user['email']
        ];
        session_regenerate_id(true);
        return true;
    }

    public function logout()
    {
        Session::destroy();
    }
}
