<?php
date_default_timezone_set("Asia/Bangkok");
//	session_start();
        $servername = "localhost";
        $username = "stocksystem";
        $password = "Eng!n33r";
        $dbname = "rangsit_engineer";
        $conn = new mysqli($servername, $username, $password, $dbname);
        $conn->set_charset("utf8");
        
        
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
