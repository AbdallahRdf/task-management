<?php

require_once "Database.php";

class User
{
    public static function create($name, $email, $password)
    {
        $sql = "INSERT INTO users(name, email, password) VALUES (:name, :email, :password);";

        $params = [
            ":name" => $name,
            ":email" => $email,
            ":password" => $password
        ];

        return (new Database())->query($sql, $params);
    }

    // if the user exists, return true, else false;
    public static function does_user_exist($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";

        $params = [":email" => $email];

        return !empty((new Database)->query($sql, $params));
    }

    // returns the user data
    public static function get_user_credentials($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";

        $params = [":email" => $email];

        return (new Database)->query($sql, $params);
    }
}