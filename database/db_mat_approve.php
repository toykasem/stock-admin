<?php
include('../config/pdo_connect.php');
if(isset($_POST["id"]))
{

	$exit = array();
	
	$statement1 = $connection->prepare(
		"SELECT * FROM tbl_stock
		 WHERE mat_code = '".$_POST["mat_code"]."' 
		 LIMIT 1"
	);
	
	$statement1->execute();
	$result1 = $statement1->fetchAll();
	
	foreach($result1 as $line1)
	{
		$exit["id"] = $line1["id"];
		$exit["mat_code"] = $line1["mat_code"];
		$exit["qty"] = $line1["qty"];

		if($exit["qty"] >= $_POST["mat_qty"]){  // ถ้าจำนวนที่มีอยู่มากกว่าจำนวนที่ขอเบิก

			$remain = $exit["qty"] - $_POST["mat_qty"];  //สร้างตัวแปลยอดคงเหลือ

			$statement2 = $connection->prepare(
				"UPDATE tbl_stock SET qty = $remain  WHERE mat_code = :mat_code"
			);
			$result2 = $statement2->execute(
				array(
					':mat_code'	        =>	$_POST["mat_code"]
				)
			);
		

		}
	}
	// echo json_encode($exit , JSON_UNESCAPED_UNICODE); mat_qty
	// *********************************************
	$statement = $connection->prepare(
		"UPDATE tbl_withdraw_log SET status = '3' WHERE id = :id"
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
	// **************************************
 echo json_encode($remain , JSON_UNESCAPED_UNICODE);
}
?>


