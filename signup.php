<?php
include "config/database.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <?php include "components/navbar.html"; ?>
    <form class="w-50 mx-auto mt-4 rounded shadow p-3 border" action="services/process-signup.php" method="POST">
        <?php
        if (isset($_GET['error'])) {
            echo "<div class='alert alert-danger'>" . $_GET['error'] . "</div>";
        }
        ?>
        <h1 class="text-dark">Create User</h1>
        <div class="form-group">
            <label for="">Username</label>
            <input name="username" class="form-control" type="text">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input name="email" class="form-control" type="text">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input name="password" class="form-control" type="text">
        </div>
        <div class="form-group">
            <label for="">Confirm Password</label>
            <input name="c_password" class="form-control" type="text">
        </div>
        <button class="btn btn-dark mt-3 w-100">Create User</button>
    </form>
</body>

</html>