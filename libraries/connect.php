<?php
$host           = "localhost"; #127.0.0.1 
$username       = "root";
$password       = "";
$database       = "comic";

$connection = mysqli_connect($host, $username, $password, $database);

// Apakah berhasil?
if ($connection == false) {
    die("Error connecting to MySQL: " . mysqli_connect_error());
}

// echo "Connection Success!";
