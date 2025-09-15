<?php

$hobbies = [];

function addHobbies($hobbie)
{
    global $hobbies;
    array_push($hobbies, $hobbie);
}
addHobbies("Singing");
addHobbies("Reading");
addHobbies("Swiming");
addHobbies("Spending");
function removeHobbie($idx)
{
    global $hobbies;
    array_splice($hobbies, $idx, 1);
}
function editHobbie($idx, $newVal)
{
    global $hobbies;
    $hobbies[$idx] = $newVal;
}

editHobbie(2, "Sleep");
print_r($hobbies);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include "components/navbar.html";
    foreach ($hobbies as $hob => $val) {
        echo " $hob => $val";
    }

    ?>
</body>

</html>