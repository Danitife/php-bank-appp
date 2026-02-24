<?php
include "../config/database.php";

$query = "SELECT * FROM users";
$response = mysqli_query($conn, $query);
if (!$response) {
    echo "Error: " . mysqli_error($conn);
} else {
    $users = mysqli_fetch_all($response, MYSQLI_ASSOC);
    print_r($users);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <table class="table border">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) { ?>
                <tr>
                    <td><?php echo $user['username'] ?></td>
                    <td><?php echo $user['email'] ?></td>
                    <td>
                        <a href="editUser.php?user_id=<?php echo $user['id'] ?>"> <!-- parameterized route -->
                            <button class="btn btn-warning">Edit</button>
                        </a>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>


<!-- Create a table in your database named user_vehicles with the following columns:
id
car_name
car_model
car_number
car_color

Create a form in a new file named addVehicle.php that takes input for all the columns except id (which should be auto-incremented).
Upon submission of the form, process the data in a new file named process-addVehicle.php. Insert the data into the user_vehicles table. After successful insertion, redirect the user to a new file named allVehicles.php that displays all the vehicles in a tabular format.
 -->