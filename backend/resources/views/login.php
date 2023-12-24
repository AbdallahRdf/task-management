<?php

session_start();

// old input values
$old_email = $_SESSION["old"] ?? "";
$should_show = isset($_SESSION["old"]) ? "block" : "none";
unset($_SESSION["old"]);

?>

<!DOCTYPE html>
<html lang="en">

<?php require_once "head.php" ?>

<body>
    <div class="container w-50 mt-4">
        <div style="display: <?= $should_show ?>" class="alert alert-danger alert-dismissible fade show" role="alert">
            Invalid Email or Password.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <form action="../../controllers/auth.php" method="post">
            <div class="mb-3">
                <input class="form-control" type="email" name="email" placeholder="E-Mail" value="<?= $old_email ?>">
            </div>
            <div class="mb-3">
                <input class="form-control" type="password" name="password" placeholder="Password">
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Log in</button>
            </div>
        </form>

        <div class="d-flex">
            <p class="me-1">Don't have an account yet?</p>
            <a href="signup.php">Sign up</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>