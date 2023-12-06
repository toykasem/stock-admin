<?php
	//session_start();
	
	$p_id = $_GET['p_id']; 
	$act = $_GET['act'];

	if($act=='add' && !empty($p_id))
	{
		if(isset($_SESSION['cart'][$p_id]))
		{
			$_SESSION['cart'][$p_id]++;
		}
		else
		{
			$_SESSION['cart'][$p_id]=1;
		}
	}

	if($act=='remove' && !empty($p_id))  //ยกเลิกการสั่งซื้อ
	{
		unset($_SESSION['cart'][$p_id]);
	}

	if($act=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $p_id=>$amount)
		{
			$_SESSION['cart'][$p_id]=$amount;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Cart</title>
</head>

<body>
<form id="frmcart" name="frmcart" method="post" action="?page=cart&act=update&p_id=$p_id">
  <table class="table table-hover">
    <tr>
    <thead>
	 <tr>
		<th >สินค้า</th>
		<!-- <td align="center" bgcolor="#EAEAEA">ราคา</td> -->
		<th align="center">จำนวน</th>
		<!-- <td align="center" bgcolor="#EAEAEA">รวม(บาท)</td> -->
		<th align="center" >Action</th>
	  </tr>
   </thead>
<?php
$total=0;
if(!empty($_SESSION['cart']))
{
	include("config/sqli_connect.php");
	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		
		$sql = "select * from tbl_mat where mat_code='$p_id'";
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($query);
		$sum =  $qty;
		$total += $sum;
		echo "<tr>";
		echo "<td width='334'>".$row["mat_name"]."</td>";
		// echo "<td width='46' align='right'>" .number_format($row["price"],2) . "</td>";
		echo "<td width='57'>";  
		echo "<input type='number' min='1' name='amount[$p_id]' value='$qty' size='2'/></td>";
		// echo "<td width='93' align='right'>".number_format($sum,2)."</td>";
		//remove product
		echo "<td width='46' align='center'><a href='?page=cart&p_id=$p_id&act=remove'>ลบ <i class='bi bi-trash'></i></a></td>";
		echo "</tr>";
	}
	echo "<tr>";
  	echo "<td colspan='1'  align='left'><b>จำนวนรวม</b></td>";
  	echo "<td align='center'>"."<b>".$total."</b>"."</td>";
  	echo "<td align='left'></td>";
	echo "</tr>";
}
?>
<tr>
<td><a href="?page=stock" class="btn btn-info" role="button" >กลับหน้ารายวัสดุ</a> <span class="bi bi-trash"></span> </td> 
<td colspan="4" align="right">
    <input type="submit" name="update"  id="button" value="ปรับปรุง"  class="btn btn-warning" />
    <input type="button" name="Submit2" value="ขอเบิกวัสดุ" class="btn btn-success" onclick="window.location='?page=confirm';" />
</td>
</tr>
</table>
</form>
</body>
</html>