<?php 
session_start();
if(isset($_REQUEST['Username'])){
//connection
    include("../config/connect_db.php");
//รับค่า user & password
    $Username = $_REQUEST['Username'];
    $Password = $_REQUEST['Password'];
//query 
    $sql="SELECT * FROM admin_login Where username='".$Username."' and password ='".$Password."' ";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_array($result);
        $_SESSION["UserID"] = $row["id"];//ประกาศตัวแปรUserIDไว้เพื่อส่งค่า
        $_SESSION["username"] =  $row["username"];
        $_SESSION["User"] = $row["firstname"]." ".$row["lastname"];//ประกาศตัวแปรUserไว้เพื่อส่งค่า
        $_SESSION["firstname"] = $row["firstname"];
        $_SESSION["Userlevel"] = 'Admin';//$row["user_level"];//ประกาศตัวแปรUserlevelไว้เพื่อส่งค่า
        $_SESSION['logged'] = true;
       // include("../save_log_function.php");
       // Save_login();
        if($_SESSION["Userlevel"]=="Admin"){?> 
              
               <script langquage='javascript'>
                        window.onload = function(e){ 
                             admin_login();
                          }
               </script>
               
        <?php } ?>

        
 <?php }else{ ?>

 <!-- html -->
<script langquage='javascript'>
window.onload = function(e){ 
         LoginFail();
     }
</script>
<!-- /html -->

<?php            
    }
}
?>


<?php            
//tbl_asset
//function save_log()
//{   //INSERT INTO `event_log` (`id`, `user_id`, `event`, `event_time`) VALUES (NULL, 'aa', 'ss', current_timestamp());
	// $user = 'root';
    // $password = '';

    // $connection = new PDO( 'mysql:host=localhost;dbname=rangsit_engineer', $user, $password );
    // $connection->exec("set names utf8");

	// $statement = $connection->prepare("INSERT INTO `event_log` (`id`, `user_id`, `event`, `event_time`) VALUES (NULL, '".$_SESSION["firstname"]."', 'LOGIN', current_timestamp())");
	// $statement->execute();
	//$result = $statement->fetchAll();
	//return $statement->rowCount();
//}
?>




<!DOCTYPE html>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html;" charset="UTF-8">
<html>
<head>
  <script src="../module/sweetalert2@10.js"></script>
  <link rel="stylesheet" href="module/sweetalert.css">
  
</head>
<body>

</body>
</html>


<script type="text/javascript">

function admin_login(){
            Swal.fire({
            title: 'Login Success?',
            text: "Admin เข้าสู่ระบบสำเร็จ!",
            icon: 'success',
            showConfirmButton: false,
            timer: 1500
            }).then((result) => {
            
                 window.location.replace("../home.php");
            
            })
}

function LoginFail(){
            Swal.fire({
            title: 'ผิดพลาด',
            text: "username หรือ password ไม่ถูกต้อง!",
            icon: 'warning',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ปิด'
            }).then((result) => {
            if (result.isConfirmed) {
                 window.location.replace("../index.php");
            }
            })
}


</script>

