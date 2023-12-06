 <?php

//Server
$con= mysqli_connect("localhost","ctservic_stock-admin","St00ck","ctservic_stock-admin") or die("Error: " . mysqli_error($con));
mysqli_query($con, "SET NAMES 'utf8' "); 

//local
// $con= mysqli_connect("localhost","root","","stock-admin") or die("Error: " . mysqli_error($con));
// mysqli_query($con, "SET NAMES 'utf8' "); 

?>
