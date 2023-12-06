<?php
 $serverName = "localhost";
 //$userName = "root";
 //$userPassword = "1234";
 //$dbName = "engineeringdb";

 $userName = "rangsit_engineer";
 $userPassword = "Eng!n33r";
 $dbName = "rangsit_engineer";
 // Create connection

 $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
  if ($conn->connect_error) {  // Check connection
                    die("Connection failed: " . $conn->connect_error);
             }
 mysqli_set_charset($conn, "utf8"); // Querr Thai Languese
 
?>