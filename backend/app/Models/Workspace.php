<?php

namespace Backend\App\Models;

use Backend\App\Database\Database;
use Backend\App\Traits\CRUDTrait;

class Workspace
{
    use CRUDTrait;

    const TABLE = "workspaces";
    const NAME = "name";
    const DESCRIPTION = "description";

    /**
     * get all the workspaces of a specific user
     * @param string|int $user_id
    */
    public static function all($user_id)
    {
        $sql = "SELECT workspaces.*, permissions.title as permission
            FROM workspaces JOIN users_workspaces JOIN permissions 
            WHERE users_workspaces.user_id = :user_id 
            AND users_workspaces.workspace_id = workspaces.id 
            AND permissions.id = users_workspaces.permission_id;";

        $params = [":user_id" => $user_id];

        return (new Database)->query($sql, $params);
    }

    /**
     * get all the workspaces that the user is added in its projects, but not added in the workspace itself
     * @param string|int $user_id
     */
    public static function guest_workspaces($user_id)
    {
        $sql = "SELECT workspaces.* FROM users_projects JOIN projects JOIN workspaces JOIN users_workspaces 
            WHERE users_projects.user_id = :user_id
            AND users_projects.project_id = projects.id 
            AND projects.workspace_id = workspaces.id 
            AND workspaces.id != users_workspaces.workspace_id;";
        
        $params = [":user_id" => $user_id];

        return (new Database)->query($sql, $params);
    }
}