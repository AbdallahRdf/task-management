<?php

namespace Backend\App\Traits;

use Backend\App\Database\Database;

trait CRUDTrait
{
    /**
     * create a record in a table
     * @param array $assoc_array associative array containing column names as keys, and their values as values;
     */
    public static function create($assoc_array)
    {
        if (empty($assoc_array)) {
            return false;
        }

        $named_parameters = array_map(fn($col_title) => ":$col_title", array_keys($assoc_array));

        $sql = "INSERT INTO " 
                . static::TABLE . "("
                . implode(", ", array_keys($assoc_array))
                . ") VALUES ("
                . implode(", ", $named_parameters)
                . ");";

        $params = array_combine(
            $named_parameters,
            array_values($assoc_array)
        );

        return (new Database)->query($sql, $params);
    }
    
    /**
     * update the record of a table
     * @param int|string $id the id of what will be updated
     * @param array $assoc_array associative array containing column names as keys, and their new values as values;
     */
    public static function update($id, $assoc_array)
    {
        if (empty($assoc_array)) { return false; }

        $sql = "UPDATE " . static::TABLE . " SET "
            . implode(", ", array_map(fn($col_title) => "$col_title = :$col_title", array_keys($assoc_array)))
            . " WHERE id = :id";

        $params = array_merge(
            [":id" => $id],
            array_combine(
                array_map(fn($col_title) => ":$col_title", array_keys($assoc_array)),
                array_values($assoc_array)
            )
        );

        return (new Database)->query($sql, $params);
    }

    public static function delete($id)
    {
        $sql = "DELETE FROM " . static::TABLE . " WHERE id = :id";

        $params = [":id" => $id];

        return (new Database)->query($sql, $params);
    }

    /**
     * get a specific record forom a table
     * @param array $assoc_array associative array containing column names as keys, and their values as values;
     */
    public static function get($assoc_array)
    {
        $sql = "SELECT * FROM "
                . static::TABLE
                . " WHERE "
                . implode(", ", array_map(fn($col_title) => "$col_title = :$col_title", array_keys($assoc_array)));

        $params = array_combine(
            array_map(fn($col_title) => ":$col_title", array_keys($assoc_array)),
            array_values($assoc_array)
        );

        return (new Database)->query($sql, $params, false);
    }
}