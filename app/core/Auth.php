<?php

namespace App\Core;


use App\Models\User;


class Auth
{

    public function signup()
    {
        if (htmlspecialchars($_POST['password']) === htmlspecialchars($_POST['confirmpassword'])) {
            $cleandata = Validator::signupValidation($_POST);
            User::signupNewUser($cleandata);
        }
    }
}
