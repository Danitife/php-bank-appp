<?php
session_start();
if (isset($_SESSION["loggenIn"])) {
    $isLoggedIn = $_SESSION["loggenIn"];
    if ($isLoggedIn['token_exp'] < time()) {
        header("Location:/php-bank-app/login.php");
        return;
    }
} else {
    header("Location: /php-bank-app/login.php");
    return;
}
