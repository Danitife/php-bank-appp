<?php
session_start();
$getEmail = $_SESSION['session_email'];
$users = $_SESSION['users'];
print_r($users);
echo $getEmail;

// password_verify
// save all the info inside the processForm.php inside an array
// Save the array in the session
// create a login form (Fields => email and password)
// Validate your input field
// Ensure the email provided by the user matches with the email in the session
// Ensure the password provided by the user matches with the password in the session using PASSWORD_VERIFY
//  If the information does not match Echo => User credentials not correct
// Else =>
// Navigate to your dashboard.php Displaying 'WELCOME TO YOUR DASHBOARD ---- FIRST NAME concatinate with LAST NAME'..... 
