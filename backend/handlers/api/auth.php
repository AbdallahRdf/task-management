<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "../../vendor/autoload.php";

use Backend\App\Models\Workspace;
use Backend\Handlers\Controllers\Auth;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json");

if(isset($_POST["firstName"]) && isset($_POST["lastName"])) // signup process
{
    echo json_encode(Auth::sign_up($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['password']));
}
else // login process
{
    $user = Auth::log_in($_POST['email'], $_POST['password']);
    if(!$user)
    {
        echo json_encode($user);
        die();
    }
    echo json_encode([
        'user' => $user,
        'workspaces' => Workspace::all($user['id'])
    ]);
}