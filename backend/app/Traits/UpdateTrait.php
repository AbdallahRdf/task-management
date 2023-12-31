<?php

namespace Backend\App\Traits;

use Backend\App\Database\Database;

trait UpdateTrait
{
    /**
     * update the record of a table
     * @param int|string $id the id of what will be updated
     * @param array $assoc_array associative array containing column names as keys, and their new values as values;
     */
    public static function update($id, $assoc_array)
    {
        if (empty($assoc_array)) { return false; }

        $sql = "UPDATE " . static::TABLE . " SET "
            . implode(", ", array_map(fn($col_title) => $col_title . ' = :' . $col_title, array_keys($assoc_array)))
            . " WHERE id = :id";

        $params = array_merge(
            [":id" => $id],
            array_combine(
                array_map(fn($col_title) => ":" . $col_title, array_keys($assoc_array)),
                array_values($assoc_array)
            )
        );

        return (new Database)->query($sql, $params);
    }
}