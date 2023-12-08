<?php

session_start();

// old input values
$old_email = $_SESSION["old"] ?? "";
$should_show = isset($_SESSION["old"]) ? "block" : "none";
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
    <div style="display: <?= $should_show ?>">
        Invalid Email or Password
    </div>
    <form action="../controllers/auth.php" method="post">
        <div>
            <input type="email" name="email" placeholder="E-Mail" value="<?= $old_email ?>">
        </div>
        <div>
            <input type="password" name="password" placeholder="Password">
        </div>
        <div>
            <button type="submit">Log in</button>
        </div>
    </form>
</body>

</html>