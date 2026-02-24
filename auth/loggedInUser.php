<?php
session_start();
if (!isset($_SESSION['token']) || time() > $_SESSION['token_exp']) {
    // token is not set or expired
    session_destroy();
    echo "Your session has expired, please login again";

    sleep(10);
    header("Location:" . dirname(__DIR__) . "/login.php");
    exit();
}
// include '../config/database.php';
include dirname(__DIR__) . '/config/database.php';
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM users WHERE email='$email'";
    try {
        $query = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($query);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
