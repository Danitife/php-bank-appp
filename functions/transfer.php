<?php
include "../database/database.php";
$acc_num = $_POST['acc_num'];

$query = "SELECT first_name, last_name FROM users WHERE account_number='$acc_num'";
$resp = mysqli_query($database, $query);
$user = mysqli_fetch_assoc($resp);
if ($user) {
    header("Location: ../index.php?acc_info=$user[first_name] $user[last_name]");
} else {
    header("Location: ../index.php?acc_err=The account does not exit");
}
