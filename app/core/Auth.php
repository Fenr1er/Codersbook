<?php

namespace App\Core;


use App\Models\User;


class Auth
{

    public function signup()
    {
        if (htmlspecialchars($_POST['password']) === htmlspecialchars($_POST['confirmpassword'])) {
            $cleandata = Validator::signupValidation($_POST);
            if (User::signupNewUser($cleandata)) {
                header("Location:/login");
                exit();
            }
        }
    }


    public function login()
    {
        $cleandata = Validator::loginValidation($_POST);
        if ($cleandata) {
            if (User::loginUser($cleandata)) {
                header("Location:/dashboard");
                exit();
            }
        }
    }

    public static function is_loggedin()
    {
        if(Session::get('loggedin')){
            return true;
        }
        return false;
    }


    
}
