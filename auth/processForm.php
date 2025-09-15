<?php
$fn = $_POST['first_name'];
if (empty($fn)) {
    echo "First name is required";
}
echo $fn;
// EMAIL_FILTER_VAR => Validate your email
// confirm your password => Can use regex
// password_hash => Hash your passsword
// Display the hashed password
// Display all user information in the processForm.php page after all input fields have been validated