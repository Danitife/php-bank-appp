<?php
Error_reporting(E_ALL);
ini_set('display_errors', 1);

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$c_password = $_POST['c_password'];

if (empty($username)) {
    // echo "Username is required";
    // return;
    header("Location: ../signup.php?error=username is required");
    return;
    // die("Username is required");
}
if (empty($email)) {
    // echo "Username is required";
    // return;
    die("Email is required");
}
if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    die("Invalid email format");
}
if (empty($password)) {
    // echo "Username is required";
    // return;
    die("Password is required");
}
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
// check if password length is less than 6 and more than 12
// check if password and confirm password are the same
// hash the password before storing it in the session
// use password_hash() function to hash the password
// use password_verify() function to verify the password in login.php





// echo "Username: " . $username . "<br>";
// echo "Email: " . $email . "<br>";
// echo "Password: " . $password . "<br>";
// echo "Confirm Password: " . $c_password . "<br>";

// session_start();
// $_SESSION['ses_username'] = $username;
// $_SESSION['ses_email'] = $email;
// $_SESSION['ses_password'] = $password;
// $_SESSION['ses_c_password'] = $c_password;

include "../config/database.php";
$query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
try {
    $result = mysqli_query($conn, $query);
    if ($result) {
        header("Location: ../login.php");
        return;
    } else {
        echo "Error: " . mysqli_error($conn);
        return;
    }
} catch (Exception $e) {
    echo "Exception Code: " . $e->getCode();
    // if ($e->getCode() == 1062) {
    //     echo "Email already exists";
    // }

    if (mysqli_errno($conn) == 1062) {
        echo "Email already exists";
        header("Location: ../signup.php?error=email already exists");
    }
    return;
}


// Write a validation for your login.php file to check 
// if the email and password fields are not empty. If they are empty, echo all feilds are required
// If the signup details === the login details, route to the dashboard.php file with a welcome message
// If not, echo invalid login details