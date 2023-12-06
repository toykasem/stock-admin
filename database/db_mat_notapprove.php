<?php
include('../config/pdo_connect.php');
//include('function.php');
if(isset($_POST["id"]))
{
	$statement = $connection->prepare(
		"UPDATE tbl_withdraw_log SET status = '2' WHERE id = :id"
	);

	$result = $statement->execute(
		array(
			
			':id'	        =>	$_POST["id"]
		
		)
	);
	if(!empty($result))
	{
		echo 'แก้ไขข้อมูล วัสดุ  สำเร็จ!';
	}
	
}
?>


