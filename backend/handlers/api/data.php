<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "../models/Task.php";

session_start();

header("Content-Type: application/json");

if($_SERVER["REQUEST_METHOD"] === "GET")
{
    echo json_encode(Task::all($_SESSION["user"]["id"]));
}
if($_SERVER["REQUEST_METHOD"] === "POST")
{
    // handles updating the isFinished column in the tasks table;
    $json_data = file_get_contents("php://input"); // get the json that came through post request
    $data = json_decode($json_data, true); 
    
    if ($data !== null) {
        Task::check($data["checked"], $data["id"]);
    } else {
        // Handle JSON decoding error
        echo json_encode(['error' => 'Invalid JSON data']);
    }
}