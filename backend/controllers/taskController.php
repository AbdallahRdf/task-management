<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "../util/functions.php";
require_once "../models/Task.php";

session_start();

function create_alert_session_variable($message, $class)
{
    $_SESSION["alert"]["message"] = $message;
    $_SESSION["alert"]["color"] = $class;
}

if($_SERVER["REQUEST_METHOD"] === "POST")
{
    
    if(isset($_POST["task-id"]) && isset($_POST["task-name"])) // update
    {
        Task::update($_POST["task-name"], $_POST["task-id"]);
        create_alert_session_variable("Task was updated successfully", "alert-success");
    }
    else if(isset($_POST["task-name"])) // create
    {
        $task_name = $_POST["task-name"];
        if(!isStrValid($task_name))
        {
            $_SESSION["task_name_error_message"] = "Invalid task name.";
            $_SESSION["old"] = $task_name;
        }
        else {
            Task::create($task_name, $_SESSION["user"]["id"]);
            create_alert_session_variable("Task was added successfully", "alert-info");
        }
    }
    else if(isset($_POST["task-id"])) // delete
    {
        Task::delete($_POST["task-id"]);
        create_alert_session_variable("Task deleted successfully", "alert-danger");
    }
}
header("location: ../resources/views/home.php");
die();