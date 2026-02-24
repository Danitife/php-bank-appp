<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../auth/loggedInUser.php";
include "../config/database.php";
if (isset($_GET['carId'])) {
    $carId = $_GET['carId'];
    $query = "SELECT * FROM park_slot WHERE availbility=TRUE";
    $response = mysqli_query($conn, $query);
    if (!$response) {
        echo "Error fetching park slots: " . mysqli_error($conn);
    } else {
        $parks = mysqli_fetch_all($response, MYSQLI_ASSOC);
    }
}

if (isset($_GET['parkId'])) {
    $parkId = $_GET['parkId'];
    $userId = $user['id'];
    $user_vehicle_query = "SELECT * FROM user_vehicle WHERE user_id=$userId";
    $user_vehicle_response = mysqli_query($conn, $user_vehicle_query);
    if (!$user_vehicle_response) {
        echo "Error fetching user vehicles: " . mysqli_error($conn);
    } else {
        $vehicles = mysqli_fetch_all($user_vehicle_response, MYSQLI_ASSOC);
    }
}

if (isset($_POST['book_slot'])) {
    $carId = $_POST['carId'];
    $parkId = $_POST['parkId'];
    $userId = $user['id'];

    $parking_query = "INSERT INTO parkings (user_id, car_id, slot_id) VALUES ($userId, $carId, $parkId)";
    $parking_response = mysqli_query($conn, $parking_query);
    if (!$parking_response) {
        echo "Error booking slot: " . mysqli_error($conn);
    } else {
        $update_slot_query = "UPDATE park_slot SET availbility=FALSE WHERE id=$parkId";
        $update_slot_response = mysqli_query($conn, $update_slot_query);
        if (!$update_slot_response) {
            echo "Error updating slot availability: " . mysqli_error($conn);
        } else {
            echo "Slot booked successfully";
            header("Location: ../park.php?success=Slot booked successfully");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php include "../components/navbar.html"; ?>
    <?php if (isset($_GET['parkId'])) { ?>
        <main>
            <h1>Select the car to park</h1>
            <div class="d-flex flex-wrap justify-content-center gap-1">
                <?php foreach ($vehicles as $vehicle) { ?>
                    <div class="card w-25 mx-auto mt-4 shadow p-3 border rounded">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $vehicle['vehicle_name']; ?></h5>
                            <p class="card-text">Model: <?php echo $vehicle['vehicle_model']; ?></p>
                            <p class="card-text">Color: <?php echo $vehicle['vehicle_color']; ?></p>
                            <p class="card-text">Plate Number: <?php echo $vehicle['vehicle_number']; ?></p>
                            <form action="process-book-slot.php" method="post">
                                <input type="hidden" name="carId" value="<?php echo $vehicle['id']; ?>">
                                <input type="hidden" name="parkId" value="<?php echo $parkId; ?>">
                                <button name="book_slot" class="btn btn-dark">Select Car</button>
                            </form>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </main>
    <?php } ?>

    <?php if (isset($_GET['carId'])) { ?>

        <main>
            <h1>Book a slot for car <?php echo $carId; ?></h1>
            <div class="d-flex flex-wrap justify-content-center gap-1">
                <?php foreach ($parks as $park) { ?>
                    <div class="card w-25 mx-auto mt-4 shadow p-3 border rounded <?php if ($park['availbility'] == TRUE) {
                                                                                        echo 'bg-success';
                                                                                    } else {
                                                                                        echo 'bg-danger';
                                                                                    } ?>">
                        <div class="card-body">
                            <h5 class="card-title">Park Slot <?php echo $park['id']; ?></h5>
                            <p class="card-text">Status: <?php echo $park['availbility'] == TRUE ? 'Available' : 'Unavailable'; ?></p>

                            <form action="process-book-slot.php" method="post">
                                <input type="hidden" name="carId" value="<?php echo $carId; ?>">
                                <input type="hidden" name="parkId" value="<?php echo $park['id']; ?>">
                                <button name="book_slot" class="btn btn-dark">Book Slot</button>
                            </form>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </main>
    <?php } ?>
</body>

</html>