<?php

namespace Backend\App\Models;

use Backend\App\Database\Database;

class Task
{
    public static function all($user_id)
    {
        $sql = "SELECT * FROM tasks WHERE user_id = :id ORDER BY create_at DESC";

        $params = [":id" => $user_id];
        
        return (new Database())->query($sql, $params);
    }

    public static function create($task_name, $user_id)
    {
        $sql = "INSERT INTO tasks(name, user_id) VALUES (:name, :user);";

        $params= [
            ":name" => $task_name,
            ":user" => $user_id
        ];

        return (new Database())->query($sql, $params);
    }

    public static function update($task_name, $id)
    {
        $sql = "UPDATE tasks SET name = :name WHERE id = :id;";

        $params = [
            ":name" => $task_name,
            ":id" => $id
        ];

        return (new Database())->query($sql, $params);
    }

    public static function delete($id)
    {
        $sql = "DELETE FROM tasks WHERE id = :id;";

        $params = [":id" => $id];

        return (new Database())->query($sql, $params);
    }

    public static function check($is_checked, $id)
    {
        $sql = "UPDATE tasks SET isFinished = :isFinished WHERE id = :id";

        $params = [
            ":isFinished" => $is_checked,
            ":id" => $id
        ];

        return (new Database())->query($sql, $params);
    }    
}