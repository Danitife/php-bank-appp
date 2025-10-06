<?php
$database = mysqli_connect("localhost", "root", "root", "bank-app");

if ($database) {
    echo "Connected";
} else {
    echo "Not connected";
    // displayError("Database not connected");
}
