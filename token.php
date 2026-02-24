<?php

// bin2hex
// random_byte
// hex2bin
// time

$sentence = "PhP is awesome!";
echo bin2hex($sentence);
// 50685020697320617765736f6d6521

echo "<br>";

echo hex2bin("50685020697320617765736f6d6521");
// how does the system decides

echo "<br>";
echo random_bytes(16);
echo "<br>";

echo time();
