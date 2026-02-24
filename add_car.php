<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "auth/loggedInUser.php";
include "config/database.php";

if ($user_id = $user['id']) {
    echo "User ID: " . $user_id;
} else {
    echo "User ID not found.";
    exit;
}

try {
    $query = "SELECT * FROM user_vehicle WHERE user_id = $user_id";
    $response = mysqli_query($conn, $query);
    if (!$response) {
        echo "Error fetching vehicles: " . mysqli_error($conn);
    } else {
        $vehicles = mysqli_fetch_all($response, MYSQLI_ASSOC);
        print_r($vehicles);
    }
} catch (\Exception $e) {
    echo "Exception caught: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Car</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<body>
    <?php include "components/navbar.html"; ?>
    <main class="w-50 mx-auto mt-4 rounded shadow p-3 border">

        <h1 class="text-dark">Add a new car</h1>
        <form action="services/processAddVehicle.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="Car name">Car name</label>
                <input name="car_name" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="Car model">Car Model</label>
                <input name="car_model" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="Car color">Car Color</label>
                <input name="car_color" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="Car picture">Car Picture</label>
                <input name="car_picture" type="file" class="form-control">
            </div>
            <div class="form-group">
                <label for="Car plate number">Car Plate Number</label>
                <input name="car_plate_number" type="text" class="form-control">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Add Car</button>
            </div>
        </form>
    </main>

    <main>
        <h1>My Vehicles</h1>
        <div class="d-flex flex-wrap gap-3">
            <?php foreach ($vehicles as $vehicle) { ?>
                <div class="card w-25 mx-auto mt-4 shadow p-3 border rounded">
                    <img src="<?php echo $vehicle['vehicle_picture']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $vehicle['vehicle_name']; ?></h5>
                        <p class="card-text">Model: <?php echo $vehicle['vehicle_model']; ?></p>
                        <p class="card-text">Color: <?php echo $vehicle['vehicle_color']; ?></p>
                        <p class="card-text">Plate Number: <?php echo $vehicle['vehicle_number']; ?></p>
                        <a href="services/process-book-slot.php?carId=<?php echo $vehicle['id']; ?>" class="btn btn-dark">Book Slot</a>
                    </div>
                </div>
            <?php } ?>
    </main>
</body>

</html>