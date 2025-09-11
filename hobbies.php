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

editHobbie(2, "Sleep")
?>
?>