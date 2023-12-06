<?php 
$matcode = $_GET['mat-code'];
//echo $matcode;
//id='$edit_id'

include_once 'config/connect.php';
  $sql = "SELECT * FROM `tbl_stock` WHERE `mat_code`='$matcode'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {  
      echo '<img src="imgs/product/ideawork.jpg" alt="Girl in a jacket" width="200" >';
       $matcode = $row["mat_code"];
       echo "<div รหัสวัสดุ  =  ".$row["mat_code"]."ยอดคงเหลือ   = ".$row["qty"]."  ชิ้น <br>" ;
       echo "<a href='?page=cart&p_id=$matcode&act=add' class='btn btn-info'> เพิ่มลงในรายการที่ต้องการเบิก </a>";
       }
    }
   
    ?>
