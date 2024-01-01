<?php

namespace Backend\App\Models;

use Backend\App\Database\Database;
use Backend\App\Traits\CRUDTrait;

class Task
{
    use CRUDTrait;

    const TABLE = "tasks";
    const NAME = "name";
    const DESCRIPTION = "description";
    const STATUS = "status";
    const START_DATE = "start_date";
    const DUE_DATE = "due_date";
    const FINISH_DATE = "finish_date";

    public static function all($project_id)
    {
        $sql = "SELECT * FROM tasks WHERE project_id = :project_id ORDER BY create_at DESC";

        $params = [":project_id" => $project_id];
        
        return (new Database())->query($sql, $params);
    }
}