<?php
$num1 = 10;
$num2 = 25;
echo "<h1>The addition of $num1 and $num2 = " . ($num1 + $num2) . "</h1>";
echo $num1 != $num2;
echo $num1 < $num2;


$weight = 22.5;
$height = 5.9;
echo "<h2>The multiplication of weight and height = " . intval($weight * $height) . "</h2>";

//ARRAY METHODS
$colors = ["Red", "Green", "Blue", "Yellow"];
print_r($colors);
echo "<br> Numbers of colors in my array is: " . count($colors);

//Adding an element to the array
array_push($colors, "Purple");

//Removing the last element from the array
array_pop($colors);
