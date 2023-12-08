<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "../util/functions.php";
require_once "../models/User.php";

if($_SERVER["REQUEST_METHOD"] === "POST")
{
    session_start();

    if(isset($_POST["name"])) // handles sign up process
    {
        $name = trim($_POST["name"]);
        $email = trim($_POST["email"]);
        $password = $_POST["password"];

        $ERRORS = [];
        $OLD = [];

        if(!isNameValid($name))
        {
            $ERRORS["name_error_message"] = "Invalid Name";
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL) || User::does_user_exist($email))
        {
            $ERRORS["email_error_message"] = "Invalid Email";
        }
        $message = isPasswordValid($password);
        if($message !== "valid")
        {
            $ERRORS["password_error_message"] = $message;
        }
        
        if(!empty($ERRORS))
        {
            $OLD["old_name"] = $name;
            $OLD["old_email"] = $email;

            $_SESSION["old"] = $OLD;
            $_SESSION["signup_errors"] = $ERRORS;
            header("location: ../views/signup.php");
            die();
        }
        $hash = password_hash($password, PASSWORD_DEFAULT);
        User::create($name, $email, $hash);
        
        $_SESSION["user"] = User::get_user_credentials($email);
        header("location: ../views/home.php");
        die();
    }
}