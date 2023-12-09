<?php

session_start();

if(!isset($_SESSION["user"])){
    header("location: login.php");
}

// handles error while creating a new task
$task_error_message = $_SESSION["task_name_error_message"] ?? "";
$old_task_name = $_SESSION["old"] ?? "";

unset($_SESSION["task_name_error_message"]);
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
    <nav>
        <a href="../../controllers/auth.php">Log out</a>
    </nav>

    <!-- add new task -->
    <form method="post" action="../../controllers/taskController.php">
        <input type="text" name="task-name" value="<?= $old_task_name ?>">
        <button type="submit">Save</button>
        <small><?= $task_error_message ?></small>
    </form><br>
    
    <!-- tasks -->
    <div id="tasks-table"></div>

    <script src="../js/script.js"></script>
</body>
</html>