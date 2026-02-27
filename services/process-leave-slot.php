<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$parkId = $_GET['parkId'];
include "../auth/loggedInUser.php";
include "../config/database.php";

$leave_slot_query = "UPDATE park_slot SET availbility=TRUE WHERE id=$parkId";
$leave_slot_response = mysqli_query($conn, $leave_slot_query);
if (!$leave_slot_response) {
    echo "Error leaving slot: " . mysqli_error($conn);
} else {
    $parkings_query = "SELECT * FROM parkings WHERE slot_id=$parkId";
    $parkings_response = mysqli_query($conn, $parkings_query);
    if (!$parkings_response) {
        echo "Error fetching parkings: " . mysqli_error($conn);
    } else {
        $parkings = mysqli_fetch_assoc($parkings_response);
        $time_spent = time() - strtotime($parkings['created_at']);
        // convert time spent to hours
        $time_spent_hours = round($time_spent / 3600, 2);
        // multiply time spent by 500 to get the total amount to be paid
        $amount_to_be_paid = $time_spent_hours * 500;

        // update the parking record with the time spent and amount to be paid
        $update_parking_query = "UPDATE parkings SET time_spent=$time_spent, amount_paid=$amount_to_be_paid, updated_at=NOW() WHERE id={$parkings['id']}";
        $update_parking_response = mysqli_query($conn, $update_parking_query);
        if (!$update_parking_response) {
            echo "Error updating parking record: " . mysqli_error($conn);
        } else {
            echo "Slot left successfully. Time spent: $time_spent_hours hours. Amount to be paid: $amount_to_be_paid";
            header("Location: ../park.php?success=Slot left successfully. Time spent: $time_spent_hours hours. Amount to be paid: $amount_to_be_paid");
            exit();
        }
    }
}
