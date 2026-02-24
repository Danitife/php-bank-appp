<?php
session_start();
include "config/database.php";

if (isset($_POST['login_btn'])) {
    $log_email = $_POST['log_email'];
    $log_password = $_POST['log_password'];

    // $query = "SELECT * FROM users WHERE email='$log_email' AND password='$log_password'"; mysqli attack
    $query = "SELECT * FROM users WHERE email='$log_email'";
    $response = mysqli_query($conn, $query);
    if (!$response) {
        echo "No user found";
    } else {
        $user = mysqli_fetch_assoc($response);
        print_r($user);
        if (!password_verify($log_password, $user['password'])) {
            echo "User information incorrect";
        } else {
            $token = bin2hex(random_bytes(16));
            $token_exp = time() + (60 * 10);
            $_SESSION['email'] = $user['email'];
            $_SESSION['token'] = $token;
            $_SESSION['token_exp'] = $token_exp;
            header("Location: dashboard.php");
        }
    }
}

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

    <form action="login.php" method="POST">
        <div class="form-group">
            <label for="">Email</label>
            <input name="log_email" type="text">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input name="log_password" type="text">
        </div>
        <button name="login_btn" class="btn btn-dark mt-3 w-100">Login</button>
    </form>
    <p>Don't have an account? <a href="signup.php">Register here</a></p>
</body>

</html>