<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "../util/functions.php";
require_once "../models/Task.php";

session_start();

if($_SERVER["REQUEST_METHOD"] === "POST")
{
    $task_name = $_POST["task-name"];

    if(!isStrValid($task_name))
    {
        $_SESSION["task_name_error_message"] = "Invalid task name.";
        $_SESSION["old"] = $task_name;
    }
    else {
        Task::create($task_name, $_SESSION["user"]["id"]);
    }
}
$_SESSION["tasks"] = Task::all();
header("location: ../views/home.php");
die();