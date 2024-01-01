<?php

namespace Backend\Controllers;

use Backend\App\Models\User;

class Auth
{
    public static function sign_up($first_name, $last_name, $email, $password): array|false
    {
        if(!empty(User::get([User::EMAIL => $email])))
        {
            return false;
        }

        User::create([
            User::FIRST_NAME => $first_name,
            User::LAST_NAME => $last_name,
            User::EMAIL => $email,
            User::PASSWORD => password_hash($password, PASSWORD_DEFAULT),
            User::CONNECTED => true
        ]);

        return User::get([User::EMAIL => $email]);
    }   

    public static function log_in($email, $password): array|false
    {
        $user_credintials = User::get([User::EMAIL => $email]);

        if(empty($user_credintials) || !password_verify($password, $user_credintials["password"]))
        {
            return false;
        }
        return $user_credintials;
    }
}