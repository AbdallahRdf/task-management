<?php

require_once "Database.php";

class Task
{
    public static function all()
    {
        return (new Database)->query("SELECT * FROM tasks");
    }

    public static function create($task_name, $user_id)
    {
        $sql = "INSERT INTO tasks(name, user_id) VALUES (:name, :user);";

        $params= [
            ":name" => $task_name,
            ":user" => $user_id
        ];

        return (new Database)->query($sql, $params);
    }
}