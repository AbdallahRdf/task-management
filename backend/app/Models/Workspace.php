<?php

namespace Backend\App\Models;

use Backend\App\Database\Database;
use Backend\App\Traits\UpdateTrait;

class Workspace
{
    use UpdateTrait;

    const TABLE = "workspaces";
    const NAME = "name";
    const DESCRIPTION = "description";

    // get all the workspaces of a specific user
    public static function all($user_id)
    {
        $sql = "SELECT workspaces.*, roles.title as permission
            FROM workspaces JOIN users_workspaces JOIN roles 
            WHERE users_workspaces.user_id = :user_id 
            AND users_workspaces.workspace_id = workspaces.id 
            AND roles.id = users_workspaces.role_id;";

        $params = [":user_id" => $user_id];

        return (new Database)->query($sql, $params);
    }

    // create a workspace
    public static function create($name, $description = null)
    {
        $sql = "INSERT INTO workspaces (name, description) VALUES (:name, :description)";

        $params = [
            ":name" => $name,
            ":description" => $description
        ];

        return (new Database)->query($sql, $params);
    }

    public static function delete($workspace_id)
    {
        $sql = "DELETE FROM workspaces WHERE id = :id";

        $params = [":id" => $workspace_id];

        return (new Database)->query($sql, $params);   
    }
}