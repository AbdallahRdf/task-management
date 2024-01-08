<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "../../vendor/autoload.php";

use Backend\App\Models\Workspace;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === "GET") 
{
    echo json_encode([
        "member" => Workspace::all($_GET["userID"]),
        "guest" => Workspace::guest_workspaces($_GET["userID"])
    ]);
}