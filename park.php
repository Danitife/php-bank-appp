<?php
error_reporting(E_ALL);

include "config/database.php";

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
                    <a href="services/process-book-slot.php?parkId=<?php echo $park['id'] ?>" class="btn btn-dark">Book Slot</a>
                </div>
            </div>
        <?php } ?>
    </div>
</body>

</html>