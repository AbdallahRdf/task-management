<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "../util/functions.php";
require_once "../models/Task.php";

session_start();

if($_SERVER["REQUEST_METHOD"] === "POST")
{
    
    if(isset($_POST["task-id"]) && isset($_POST["task-name"])) // update
    {
        Task::update($_POST["task-name"], $_POST["task-id"]);
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
        }
    }
    else if(isset($_POST["task-id"]))
    {
        Task::delete($_POST["task-id"]);
    }
}
header("location: ../resources/views/home.php");
die();