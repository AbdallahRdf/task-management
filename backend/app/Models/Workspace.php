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
}