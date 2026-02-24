<?php
// three ways to display text in PHP => echo, print, print_r
echo ("My name is Daniel <br>");
echo "<h1>I am learning PHP</h1>";
print("I like money, that's why I'm learning programming");
print_r("I want to be rich <br>");

$name = "samuel";
echo "my name is $name";

$names = ["Daniel", "John", "Smith"];
// echo $names;
print_r($names);

$my_name;
$myName;
$jj11;

$Remain; //Except it is a Class or Constant.

//Data types in PHP
//1. String
$my_name = "Daniel";
// String methods
$length = strlen($my_name); //Get length of string
echo "<br> Length of my name is: $length";
$last_name = "Developer";

$location = "I am going to SQI";
echo substr($location, 13, 4);
echo $location[-1];
echo $location[0];

$full_name = $my_name . $last_name; //Concatenation
// other string methods (uppercase, lowercase, replace, substring, indexOf, trim, padStart, padEnd.)
$tt = str_pad($my_name, 14, "*", STR_PAD_LEFT);
echo $tt;

//2. Integer
$my_age = 20;
//3. Float
$my_height = 5.9;
//4. Boolean
$is_student = true;
//5. Array
$fruits = ["Mango", "Banana", "Orange"];
