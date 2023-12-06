<?php
 $serverName = "localhost";
 
 //LOCAL
//  $userName = "root";
//  $userPassword = "";
//  $dbName = "stock-admin";

//Server
$userName = "ctservic_stock-admin";
 $userPassword = "St00ck";
 $dbName = "ctservic_stock-admin";


 // Create connection
 $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
  if ($conn->connect_error) {  // Check connection
                    die("Connection failed: " . $conn->connect_error);
             }
 mysqli_set_charset($conn, "utf8"); // Querr Thai Languese
?>