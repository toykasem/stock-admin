<?php
date_default_timezone_set("Asia/Bangkok");
//	session_start();
        $servername = "localhost";
       // $username = "rangsit_engineer";
        //$password = "Eng!n33r";

        $username = "root";
        $password = "";


        $dbname = "rangsit_asset";
        $conn = new mysqli($servername, $username, $password, $dbname);
        $conn->set_charset("utf8");
        
        
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
