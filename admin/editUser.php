<?php
include "../config/database.php";
if (!isset($_GET['user_id'])) {
    echo "User does not exist";
}

$user_id = $_GET['user_id'];
$query = "SELECT username, email FROM users WHERE id='$user_id'";
$response = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($response);

if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];

    $update_query = "UPDATE users SET username='$username', email='$email' WHERE id='$user_id'";
    $update_response = mysqli_query($conn, $update_query);
    if ($update_response) {
        echo "User updated successfully";
        header("Location:allUser.php");
    } else {
        echo "Failed to update" . mysqli_error($conn);
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
    <main>
        <form class="w-50 mx-auto mt-4 rounded shadow p-3 border" action="editUser.php?user_id=<?php echo $user_id ?>" method="POST">
            <h1 class="text-dark">Update User</h1>
            <div class="form-group">
                <label for="">Username</label>
                <input value="<?php echo $user['username'] ?>" name="username" class="form-control" type="text">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input value="<?php echo $user['email'] ?>" name="email" class="form-control" type="text">
            </div>
            <button name="update" class="btn btn-dark mt-3 w-100">Save Changes</button>
        </form>
    </main>
</body>

</html>