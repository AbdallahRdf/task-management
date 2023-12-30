<?php

namespace Backend\App\Models;

use Backend\App\Database\Database;

class Workspace
{
    const NAME = "name";
    const DESCRIPTION = "description";

    // get all the workspaces of a specific user
    public static function all($user_id)
    {
        $sql = "SELECT workspaces.* FROM workspaces JOIN users_workspaces 
        WHERE users_workspaces.user_id = :user_id AND users_workspaces.workspace_id = workspaces.id";

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

    /**
     * update the workspace
     * @param int|string $workspace_id the id of the workspace to update
     * @param array $assoc_array associative array containing column names as keys, and their new values as values;
     */
    public static function update($workspace_id, $assoc_array)
    {
        $sql = "UPDATE workspaces SET " 
                . implode(", ", array_map(fn($col_title) => $col_title . ' = :' . $col_title, array_keys($assoc_array))) 
                . " WHERE id = :id";

        $params = array_merge(
            [":id" => $workspace_id], 
            array_combine(
                array_map(fn($col_title) => ":".$col_title, array_keys($assoc_array)), 
                array_values($assoc_array)
            )
        );

        return (new Database)->query($sql, $params);
    }

    public static function delete($workspace_id)
    {
        $sql = "DELETE FROM workspaces WHERE id = :id";

        $params = [":id" => $workspace_id];

        return (new Database)->query($sql, $params);   
    }
}