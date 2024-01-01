<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "../../vendor/autoload.php";

use Backend\Handlers\Controllers\Auth;

header("Content-Type: application/json");

if(isset($_POST["first_name"]) && isset($_POST["last_name"]))
{
    echo json_encode(Auth::sign_up($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password']));
}
else
{
    echo json_encode(Auth::log_in($_POST['email'], $_POST['password']));
}