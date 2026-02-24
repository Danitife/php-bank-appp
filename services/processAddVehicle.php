<?php
include "../auth/loggedInUser.php";
include "../config/database.php";
$car_name = $_POST['car_name'];
$car_model = $_POST['car_model'];
$car_color = $_POST['car_color'];
$car_plate_number = $_POST['car_plate_number'];
$car_picture = $_FILES['car_picture']['name'];

if (empty($car_name) || empty($car_model) || empty($car_color) || empty($car_plate_number)) {
    header("Location: ../add_car.php?error=All fields are required");
    exit();
}


$query = "INSERT INTO user_vehicle (user_id, vehicle_name, vehicle_model, vehicle_number, vehicle_color, vehicle_picture) VALUES ({$user['id']}, '$car_name', '$car_model', '$car_plate_number', '$car_color', '$car_picture')";
$response = mysqli_query($conn, $query);
if (!$response) {
    echo "Error adding vehicle: " . mysqli_error($conn);
} else {
    echo "Vehicle added successfully";
    header("Location: ../add_car.php?success=Vehicle added successfully");
    exit();
}
