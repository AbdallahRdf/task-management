<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "../util/functions.php";
require_once "../models/User.php";

session_start();

function user_is_valid($user_credentials)
{
    $_SESSION["user"] = $user_credentials;
    header("location: ../views/home.php");
    die();
}

if($_SERVER["REQUEST_METHOD"] === "POST")
{
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    if(isset($_POST["name"])) // handles sign up process
    {
        $name = trim($_POST["name"]);

        $ERRORS = [];
        $OLD = [];

        if(!isNameValid($name))
        {
            $ERRORS["name_error_message"] = "Invalid Name";
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL) || count(User::get_user_credentials($email)) > 0)
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

        user_is_valid(User::get_user_credentials($email)[0]);
    }
    else if(isset($_POST["email"])) // handles login process
    {
        $users_credentials = User::get_user_credentials($email);
        $is_password_correct = password_verify($password, $users_credentials[0]["password"]);
        
        // if the email is not valid, there is no account with the email, or the password is incorrect then:
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) || count($users_credentials) <= 0 || !$is_password_correct) 
        {
            $_SESSION["old"] = $email;
            header("location: ../views/login.php");
            die();
        }
        user_is_valid($users_credentials[0]);
    }
}
if(isset($_SESSION["user"]))
{
    unset($_SESSION);
    session_destroy();
}
header("location: ../views/login.php");
die();
