<?php

namespace App\Models;


use App\Core\Model;
use App\Core\Session;

class User extends Model
{
    /* -------------------------------------------------------------------------- */
    /*                           <--LogikKommtHierHin-->                          */
    /* -------------------------------------------------------------------------- */
    public static function signupNewUser($data)
    {
        $uid = self::generateUniqueId();
        if (isset($uid)) {
            $db = self::db();
            $query = "INSERT INTO users(uid, username, email, password_hash) VALUES(?, ?, ?, ?)";
            $db->query($query, [$uid, $data['username'], $data['email'], $data['password']]);
            $db->close();
           return true;
        }
        return false;
    }

    public static function loginUser($data)
    {
        $db = self::db();
        $query = "SELECT * FROM users WHERE username = ? OR email = ?";
        $user = $db->query($query, [$data['lname'], $data['lname']])->find();

        if (password_verify($data['pw'], $user->password_hash)) {
            Session::set('loggedin', true);
            Session::set('uid', $user->uid);
            Session::set('username', $user->username);
            Session::set('role', $user->role);
            Session::set('profile_image', $user->image);
            $db->close();
            return true;
        }
        $db->close();
        return false;
    }


    public static function generateUniqueId()
    {
        $uid = uniqid();
        $db = self::db();
        $query = "SELECT uid From users Where uid = ?";
        $result = $db->query($query, [$uid])->all();

        if (!$result) {
            return $uid;
        }
        self::generateUniqueId();

        $db->close();
    }
}
