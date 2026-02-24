<?php
error_reporting(E_ALL);

use FFI\Exception;

session_start();
if (!isset($_SESSION['token']) || time() > $_SESSION['token_exp']) {
    // token is not set or expired
    session_destroy();
    echo "Your session has expired, please login again";

    sleep(10);
    header("Location: login.php");
    exit();
}
include 'config/database.php';
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM users WHERE email='$email'";
    try {
        $query = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($query);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
if (isset($_POST["update_profile_picture"])) {
    $img_dir = "images/";
    $img_name = basename($_FILES['profile_picture']['name']);
    $img_path = $img_dir . $img_name;
    echo $img_path;
    try {
        if (!move_uploaded_file($_FILES['profile_picture']['tmp_name'], $img_path)) {
            echo "Failed to move uploaded file.";
            throw new Exception("Failed to move uploaded file.");
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "<h1>No file uploaded</h1>";
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
    <?php include "components/navbar.html"; ?>
    <div>
        <div class="d-flex justify-content-end">
            <a href="add_car.php" class="btn btn-dark">Add Car</a>
        </div>
    </div>
    <main>
        <div class="card w-25 mx-auto mt-4 shadow p-3 border rounded">
            <div class="card-body">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTr3jhpAFYpzxx39DRuXIYxNPXc0zI5F6IiMQ&s" alt="">

                <form action="profile.php" method="POST" enctype="multipart/form-data">
                    <input name="profile_picture" type="file" accept=".png, .jpeg, .jpg" />
                    <button name="update_profile_picture">Update Profile Picture</button>
                </form>
                <h1 class="card-title">Profile</h1>
                <p class="card-text">Name: <?php echo $user['username']; ?></p>
                <p class="card-text">Email: <?php echo $user['email']; ?></p>
            </div>
        </div>
    </main>
</body>

</html>