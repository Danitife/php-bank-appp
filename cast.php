<?php
$my_name = (string)"John";
$my_name = (int)42;
$is_student = (bool)true;
echo $my_name;
$hobbies = (array)["Reading", "Traveling", "Swimming"];
// assignment correction

function addToArray($hobb)
{
    global $hobbies;
    array_push($hobbies, $hobb);
    return $hobbies;
}
addToArray("Cooking");
addToArray("Singing");
addToArray("Programming");
// print_r($hobbies);

function removeFromArray($idx)
{
    global $hobbies;
    array_splice($hobbies, $idx, 1);
    print_r($hobbies);
    return;
}

removeFromArray(2);
// echo "<br>";
// removeFromArray(2);
// echo "<br>";
// removeFromArray(2);

// - I like reading
// - I like traveling
// - I like swimming
// - I like cooking
// - I like singing
// - I like programming
echo count($hobbies);
echo "<br>";
for ($i = 0; $i < count($hobbies); $i++) {
    echo "I like $hobbies[$i] <br>";
}

for ($i = 1; $i <= 12; $i++) {
    echo "2 x $i = " . 2 * $i . "<br>";
}

function multiplication($num)
{
    for ($i = 1; $i <= 12; $i++) {
        echo "$num x $i = " . $num * $i . "<br>";
    }
}
multiplication(5);
multiplication(7);

// echo even numbers between 1 to 50
// echo odd numbers between 1 to 50
// from 1 to 50 dont print numbers divisible by 3
// conditional statements
// create an array and reverse it using a function
$arr = ["a", "b", "c", "d", "e"];
function reverseArray($array)
{
    // expected output: ["e", "d", "c", "b", "a"]
}
$pass1 = "admin";
$pass2 = "admin123";

if ($pass1 == $pass2) {
    echo "<h2 style='background-color: green'>Passwords match</h2>";
} else {
    echo "<h2 style='background-color: red'>Passwords do not match</h2>";
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
    <h1>Hello world</h1>
</body>

</html>

<style></style>