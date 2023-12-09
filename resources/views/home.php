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

// handles alerts
$should_show = isset($_SESSION["alert"]);
$class = $_SESSION["alert"]["color"] ?? "";
$message = $_SESSION["alert"]["message"] ?? "";

unset($_SESSION["alert"]);

?>

<!DOCTYPE html>
<html lang="en">

<?php require_once "head.php" ?>

<body>
    <nav>
        <a class="btn btn-secondary" href="../../controllers/auth.php">Log out</a>
    </nav>

    <?php if($should_show){ require_once "alert.php"; }?>
        
    <div class="container d-flex flex-column align-items-center">
        <!-- add new task -->
        <form method="post" action="../../controllers/taskController.php" class="mb-5 mt-4">
            <div class="input-group">
                <input class="form-control" type="text" name="task-name" value="<?= $old_task_name ?>" placeholder="Task name">
                <button class="btn btn-outline-primary" type="submit">Save</button>
            </div>
            <small>
                <?= $task_error_message ?>
            </small>
        </form><br>
        
        <!-- tasks -->
        <div id="tasks-table" class="w-50"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../js/script.js"></script>
</body>
</html>