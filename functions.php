<?php
$action = "running";
$name = "My name is Sarah";
function whatImIDoing()
{
    // $action = "coding";
    global $action;
    echo "I am $action";
}

whatImIDoing();

function addNumbers($num1, $num2)
{
    return $num1 + $num2;
}

$sum = addNumbers(5, 10);

function changeName($changedName)
{
    global $name;
    $name = "My name is $changedName";
    return $name;
}
// function declaration
// invoking the function or calling the function
echo changeName("Samuel");

// ASSIGNMENT
// Create a function that adds a value to an array;
// Create a function that removes a value from an array;
// Create a function that changes a value in an array;
// $myArray = ["Apple", "Banana", "Orange"];

// Create a function that sums three numbers;
// Create a function that subtracts two numbers;
// Create a function that returns the square root of a number;
