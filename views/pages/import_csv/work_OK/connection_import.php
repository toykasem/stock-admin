<?php
// Database configuration
$dbHost     = "localhost";
//$dbUsername = "root";
//$dbPassword = "";
$userName = "rangsit_engineer";
$dbPassword = "Eng!n33r";
$dbName     = "rangsit_engineer";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}