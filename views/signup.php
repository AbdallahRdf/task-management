<?php

session_start();

// error messages
$name_error_message = $_SESSION["signup_errors"]["name_error_message"] ?? "";
$email_error_message = $_SESSION["signup_errors"]["email_error_message"] ?? "";
$password_error_message = $_SESSION["signup_errors"]["password_error_message"] ?? "";

// old input values
$old_name = $_SESSION["old"]["old_name"] ?? "";
$old_email = $_SESSION["old"]["old_email"] ?? "";

unset($_SESSION["signup_errors"]);
unset($_SESSION["old"]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow</title>
</head>

<body>
    <form action="../controllers/auth.php" method="post">
        <div>
            <input type="text" name="name" placeholder="Full Name" value="<?= $old_name ?>">
            <small>
                <?= $name_error_message ?>
            </small>
        </div>
        <div>
            <input type="email" name="email" placeholder="E-Mail" value="<?= $old_email ?>">
            <small>
                <?= $email_error_message ?>
            </small>
        </div>
        <div>
            <input type="password" name="password" placeholder="Password">
            <small>
                <?= $password_error_message ?>
            </small>
        </div>
        <div>
            <button type="submit">Sign up</button>
        </div>
    </form>
</body>

</html>