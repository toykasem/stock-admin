<?php
   include("config/sqli_connect.php");
?>

 <?php
 
 $name='w'.date('Y-m-d_hia'); 
 //echo   $name;
 $withdraw_id = $name;
	$total=0;
  $user = $_SESSION["UserID"];
  if(isset($_SESSION['cart'])){

    foreach($_SESSION['cart'] as $p_id=>$qty){

              $sql	= "INSERT INTO `tbl_withdraw_log` (`id`, `withdraw_id`, `withdraw_mat`, `withdraw_qty`, `withdraw_time`, `status`, `user`) 
              VALUES (NULL, '$withdraw_id', '$p_id', '$qty', current_timestamp(), '1', '$user')";
              $query	= mysqli_query($conn, $sql);
             
            
    }

    $sql2	= "INSERT INTO `tbl_withdraw` (`id`, `withdraw_id`,`user`,`time` ) 
    VALUES (NULL, '$withdraw_id', '$user', current_timestamp())";
    $query2	= mysqli_query($conn, $sql2);

            if($query && $query2){

                unset($_SESSION['cart']);
                echo '<script >
              Swal.fire({
                title: "Good job!",
                text: "You clicked the button!",
                icon: "success"
              }).then((result) => {
                window.location.replace("?page=stock");
                });
              </script>';
            }
            else{
              echo '<script >
              Swal.fire({
                title: "wrong!",
                text: "Something went wrong!",
                icon: "error"
              });
              </script>';
            }



  }
	
	
?>




<!-- <script type="text/javascript" language="javascript" >
//alert(data);
      Swal.fire(
            'Good job!',
            data +'You clicked the button!',
            'success'
        ).then((result) => {
            window.location.replace("?page=stock");
            })

</script> -->