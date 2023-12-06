<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rangsit_engineer";

$user_id = $_SESSION["User"] ;
$user_event ="LOGIN";


 $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
 // set the PDO error mode to exception
 //INSERT INTO `event_log` (`id`, `user_id`, `event`, `event_time`) VALUES (NULL, 'aa', 'ss', current_timestamp());
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $sql = "INSERT INTO event_log (id, user_id, event, event_time)
 VALUES (NULL, $user_id, $user_event, current_timestamp())";
 // use exec() because no results are returned
 $conn->exec($sql);

 ?>
