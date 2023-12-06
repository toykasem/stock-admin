<?php
   include("config/sqli_connect.php");
?>

<form id="frmcart" name="frmcart" method="post" action="saveorder.php">
  <table  class="table table-bordered table-striped" >
    <tr>
      <td width="1558" colspan="4" bgcolor="#FFDDBB">
      <strong>สั่งซื้อสินค้า</strong></td>
    </tr>
    <tr>
      <td >ชื่อวัสดุที่เบิก</td>
   
      <td align="center" >จำนวน</td>
      
    </tr>
<?php
	$total=0;
	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql	= "select * from tbl_mat where mat_code='$p_id'";
		$query	= mysqli_query($conn, $sql);
		$row	= mysqli_fetch_array($query);
		$sum	= $qty;
		//$total	+= $sum;
    echo "<tr>";
    echo "<td>" . $row["mat_name"] . "</td>";
   
    echo "<td align='right'>$qty</td>";
    // echo "<td align='right'>".$sum."</td>";
    echo "</tr>";
	}
	//echo "<tr>";
    //echo "<td  align='right' colspan='1'><b>รวม</b></td>";
    //echo "<td align='right' >"."<b>".$total."</b>"."</td>";
   // echo "</tr>";
?>
</table class="table table-bordered table-striped">
<p>    
<table border="0" cellspacing="0" align="center">
<tr>
	<td colspan="2" bgcolor="#CCCCCC">ผู้เบิกวัสดุ</td>
</tr>
<tr>
    <td bgcolor="#EEEEEE">ชื่อ</td>    
    <td><input name="name" type="text" id="name" value = "<?php echo  $_SESSION["User"]; ?>" required/></td>
</tr>


<tr>
	<td colspan="2" align="center" bgcolor="#CCCCCC">
	<input type="submit" name="Submit2" value="ยืนยันรายการ" />
</td>
</tr>
</table>
</form>
