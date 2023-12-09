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

<?php require_once "head.php" ?>


<body>
    <div class="container w-50 mt-4">
        <form action="../../controllers/auth.php" method="post">
        <div class="mb-3">
            <input class="form-control" type="text" name="name" placeholder="Full Name" value="<?= $old_name ?>">
                <small class="text-danger">
                    <?= $name_error_message ?>
                </small>
            </div>
            <div class="mb-3">
                <input class="form-control" type="email" name="email" placeholder="E-Mail" value="<?= $old_email ?>">
                <small class="text-danger">
                    <?= $email_error_message ?>
                </small>
            </div>
            <div class="mb-3">
                <input class="form-control" type="password" name="password" placeholder="Password">
                <small class="text-danger">
                    <?= $password_error_message ?>
                </small>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Sign up</button>
            </div>
        </form>
        
        <div class="d-flex">
            <p>Already have an account ?</p>
            <a href="login.php">Log in</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>