<?php

namespace App\Core;

class Validator
{

    public static function signupValidation($data)
    {
        $username = htmlspecialchars($data['username']);
        $email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
        $password = password_hash(htmlspecialchars($data['password']), PASSWORD_DEFAULT);

        return [
            'username' => $username,
            'email' => $email,
            'password' => $password
        ];
    }
}
