<?php

namespace Backend\App\Models;

use Backend\App\Database\Database;
use Backend\App\Traits\UpdateTrait;

class Project
{
    use UpdateTrait;

    const TABLE = "projects";
    const NAME = "name";
    const DESCRIPTION = "description";
    const STATUS = "status";
    const START_DATE = "start_date";
    const DUE_DATE = "start_date";
    const FINISH_DATE = "start_date";

    public static function all($workspace_id)
    {
        $sql = "SELECT * FROM projects WHERE workspace_id = :workspace_id";

        $params = [":workspace_id" => $workspace_id];

        return (new Database)->query($sql, $params);
    }

    public static function create($name, $workspace_id)
    {
        $sql = "INSERT INTO projects(name, workspace_id) VALUES (:name, :workspace_id);";

        $params = [
            ":name" => $name,
            ":workspace_id" => $workspace_id
        ];

        return (new Database)->query($sql, $params);
    }

}