<?php

namespace Backend\App\Models;

use Backend\App\Database\Database;

class UserWorkspace
{
    public static function create($user_id, $workspace_id, $role_id)
    {
        $sql = "INSERT INTO users_workapces (user_id, workspace_id, role_id) VALUES (:user_id, :workspace_id, :role_id);";

        $params = [
            ":user_id" => $user_id,
            ":workspace_id" => $workspace_id, 
            ":role_id" => $role_id
        ];

        return (new Database)->query($sql, $params);
    }
}