<?php
error_reporting(E_ALL);

include "config/database.php";
include "auth/loggedInUser.php";

// try {
//     for ($i = 0; $i < 50; $i++) {
//         $query = "INSERT INTO park_slot(id) VALUES ($i)";
//         $response = mysqli_query($conn, $query);
//         if (!$response) {
//             echo "Error inserting park slot";
//         } else {
//             echo "Park slot inserted successfully";
//         }
//     }
// } catch (\Exception $e) {
//     throw new \Exception($e->getMessage());
// }

try {
    $query = "SELECT * FROM park_slot";
    $response = mysqli_query($conn, $query);
    if (!$response) {
        echo "Error fetching park slots";
    }
    $parks = mysqli_fetch_all($response, MYSQLI_ASSOC);
} catch (\Exception $e) {
    throw new \Exception($e->getMessage());
}

$my_parking_query = "SELECT * FROM parkings WHERE user_id={$user['id']} AND time_spent IS NULL";
$my_parking_response = mysqli_query($conn, $my_parking_query);
if (!$my_parking_response) {
    echo "Error fetching my parking: " . mysqli_error($conn);
} else {
    $my_parkings = mysqli_fetch_all($my_parking_response, MYSQLI_ASSOC);
    print_r($my_parkings);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Park</title>
</head>

<body>
    <?php include "components/navbar.html"; ?>
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

                    <?php if (in_array($park['id'], array_column($my_parkings, 'slot_id'))) { ?>
                        <a href="services/process-leave-slot.php?parkId=<?php echo $park['id'] ?>" class="btn btn-warning">Leave Slot</a>
                    <?php } else { ?>
                        <a href="services/process-book-slot.php?parkId=<?php echo $park['id'] ?>" class="btn btn-dark">Book Slot</a>
                    <?php } ?>


                </div>
            </div>
        <?php } ?>
    </div>
</body>

</html>