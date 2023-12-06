<?php
session_start();
//connection
// include("save_log_function.php");
// Save_logout();


session_destroy();
header("Location:index.php?page=Landding");	
?>


