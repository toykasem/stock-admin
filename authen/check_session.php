<?php
session_start();
   if (!$_SESSION["UserID"]){  //check session
     Header("Location:index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
}

?>