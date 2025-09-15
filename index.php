<?php
$greetings = "Welcome to Danitified Banking App";
$services = [
    "front end" => ["price" => 20000, "language" => "JS"],
    "back end" => ["price" => 5000, "language" => "PHP"]
]

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include "components/navbar.html" ?>
    </nav>
    <h1><?php echo $greetings ?></h1>
    <h1><?php echo array_keys($services)[0] . $services['front end'] ?></h1>
    <h1><?php echo array_keys($services)[1] . $services['back end'] ?></h1>

    <?php
    foreach ($services as $key => $value) {
        echo "<h1> $key</h1>";
        foreach ($value as $el => $dan) {
            echo "<ul><li>$el => $dan</li></ul>";
        }
    }
    ?>
</body>

</html>

<!-- Create a new github repository named (portfolio) 
=> Create a portfolio for a tech team
=> Landing page
=> About page
=> Contact page
=> Services page
=> Pricing page
=> Project page

--- Using the same navbar and footer for all pages (includes)
--- Don't hardcode the services and prices

{
    name: "Dan",
    email: "dan@gmil....."
}
LAN
WAN"
HTTPS -->