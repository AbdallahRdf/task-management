<?php

namespace Backend\App\Models;

use Backend\App\Database\Database;
use Backend\App\Traits\CRUDTrait;

class Project
{
    use CRUDTrait;

    const TABLE = "projects";
    const NAME = "name";
    const DESCRIPTION = "description";
    const STATUS = "status";
    const START_DATE = "start_date";
    const DUE_DATE = "due_date";
    const FINISH_DATE = "finish_date";

    public static function all($workspace_id)
    {
        $sql = "SELECT * FROM projects WHERE workspace_id = :workspace_id ORDER BY create_at DESC";

        $params = [":workspace_id" => $workspace_id];

        return (new Database)->query($sql, $params);
    }
}