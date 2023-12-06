<?php
// Database configuration
$dbHost     = "localhost";
// $dbUsername = "rangsit_engineer";
// $dbPassword = "Eng!n33r";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "rangsit_engineer";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
mysqli_set_charset($db , "utf8"); // Querr Thai Languese
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

