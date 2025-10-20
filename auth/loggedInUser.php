<?php
session_start();
if (isset($_SESSION["loggenIn"])) {
    $isLoggedIn = $_SESSION["loggenIn"];
    if ($isLoggedIn['token_exp'] < time()) {
        header("Location:../login.php");
        return;
    }
} else {
    header("Location: ../login.php");
    return;
}
