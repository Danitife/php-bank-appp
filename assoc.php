<?php
$users = [
    ["first_name" => "Dan", "email" => "dan@gmail.com", "gender" => "Male", "location" => "Ibadan"],
    ["first_name" => "Sam", "email" => "sam@gmail.com", "gender" => "Male", "location" => "Abuja"],
    ["first_name" => "Kemi", "email" => "kemi@gmail.com", "gender" => "Female", "location" => "Ibadan"],
    ["first_name" => "Rose", "email" => "rose@gmail.com", "gender" => "Female", "location" => "Lagos"],
];

// pushToArray("Jumoke", "jumoke@gmail", "Female", "Lagos");
// pushToArray("Jumoke", "jumoke@gmail", "Female", "Lagos");
// removeFromArray(1);

echo $users[2]["email"];
$task = ["Code", "Sleep", "Shopping"];
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
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Location</th>
                </tr>
            </thead>
        </table>
        <tbody>
            <?php
            foreach ($users as $user) {
                echo "
                    <tr>
                        <td>$user[first_name]</td>
                        <td>$user[email]</td>
                        <td>$user[gender]</td>
                        <td>$user[location]</td>
                    </tr>";
            }
            ?>
            <?php foreach ($users as $user) { ?>
                <tr>
                    <td><?php echo $user['first_name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['gender']; ?></td>
                    <td><?php echo $user['location']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </main>
</body>

</html>