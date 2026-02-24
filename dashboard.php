<?php
session_start();
include "config/database.php";
$email = $_SESSION['email'];

if (!isset($_SESSION['token']) || time() > $_SESSION['token_exp']) {
    // token is not set or expired
    session_destroy();
    echo "Your session has expired, please login again";

    sleep(10);
    header("Location: login.php");
    exit();
}

$query = "SELECT * FROM users WHERE email='$email'";
$response = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($response);



if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
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
    <main>
        <form action="dashboard.php" method="POST">
            <button name="logout">Logout</button>
        </form>
        <h1>Welcome to your dashboard, <?php echo $user['username']; ?>!</h1>
    </main>
</body>

</html>