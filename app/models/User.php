<?php

namespace App\Models;


use App\Core\Model;


class User extends Model
{
    /* -------------------------------------------------------------------------- */
    /*                           <--LogikKommtHierHin-->                          */
    /* -------------------------------------------------------------------------- */
    public static function signupNewUser($data)
    {
        $uid = self::generateUniqueId();
        if (isset($uid)){
            $db = self::db();
            $query = "INSERT INTO users(uid, username, email, password_hash) VALUES(?, ?, ?, ?)";
            $db->query($query, [$uid, $data['username'], $data['email'], $data['password']]);
            $db->close();
            header("Location:/login");
            exit();
        }
    }

    public static function generateUniqueId(){
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
