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

    // returns array of user, each user is an array with the user data
    public static function get_user_credentials($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";

        $params = [":email" => $email];

        return (new Database)->query($sql, $params);
    }
}