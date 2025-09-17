<?php
$fn = $_POST['first_name'];
$ln = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$c_password = $_POST['c_password'];

function displayError($message)
{
    header("Location: ../register.php?anything=$message");
    exit();
}
if (empty($fn)) {
    displayError("First name is required");
}
if (empty($ln)) {
    displayError("Last name is required");
}
if (empty($email)) {
    header("Location: ../register.php?anything=Email is required");
    exit();
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../register.php?anything=Your email is invalid");
    exit();
}
if (!preg_match("/[a-z]/", $_POST['password'])) {
    header("Location: ../register.php?anything=Your password must contain lowercase");
    exit();
}
if (!preg_match("/[A-Z]/", $_POST['password'])) {
    header("Location: ../register.php?anything=Your password must contain uppercase");
    exit();
}
if (!preg_match("/[0-9]/", $_POST['password'])) {
    header("Location: ../register.php?anything=Your password must contain at least one number");
    exit();
}
if (!preg_match("/[#@_$&*!+{}()]/", $_POST['password'])) {
    header("Location: ../register.php?anything=Your password must contain at least one special character");
    exit();
}
if ($password != $c_password) {
    header("Location: ../register.php?anything=Your password does not match");
    exit();
}
session_start();
$arr = ["Dan", "Sam", "Vic"];
$_SESSION['users'] = $arr;
$_SESSION['session_email'] = $email;
header("Location: ../login.php");
// echo $fn;
// EMAIL_FILTER_VAR => Validate your email
// confirm your password => Can use regex
// password_hash => Hash your passsword
// Display the hashed password
// Display all user information in the processForm.php page after all input fields have been validated