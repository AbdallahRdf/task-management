<?php

namespace Backend\App\Models;

use Backend\App\Database\Database;

class User
{
    public static function create($first_name, $last_name, $email, $password)
    {
        $sql = "INSERT INTO users(first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password);";

        $params = [
            ":first_name" => $first_name,
            ":last_name" => $last_name,
            ":email" => $email,
            ":password" => $password
        ];

        return (new Database())->query($sql, $params);
    }

    public static function update($id, $first_name, $last_name, $password)
    {

    }

    // returns the user credentials;
    public static function get($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";

        $params = [":email" => $email];

        return (new Database)->query($sql, $params, false);
    }
}