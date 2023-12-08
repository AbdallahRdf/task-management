<?php

// validate the name
function isNameValid($name)
{
    return preg_match("/[a-zA-Z]+(\s*([a-zA-Z])*)*$/", $name); // This pattern is designed to match words consisting of alphabetical characters
}

// validate the name
function isStrValid($str)
{
    return preg_match("/[a-zA-Z0-9]+(\s*([a-zA-Z0-9])*)*$/", $str); // This pattern is designed to match words consisting of alphabetical characters
}


// validate the password
function isPasswordValid($password)
{
    if (strlen($password) < 8) {
        return "Password must be at least 8 characters long.";
    }
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9_\-!#]*$/", $password)) {
        return "Password must contain at least one lowercase letter, one uppercase letter, one number, and one special character (_-!#).";
    }
    return "valid";
}