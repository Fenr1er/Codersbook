<?php

namespace App\Core;

class Session {

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }
        return false;
    }

    public static function destroy()
    {
        $_SESSION['logedin'] = false;
        session_unset();
        session_destroy();
        return true;
    }


    
}