<?php
include('../config/pdo_connect.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		
		$statement = $connection->prepare("
			INSERT INTO tbl_subdivision (subdivision_code, subdivision_name, division_ref, part_ref) 
			VALUES (:subdivision_code, :subdivision_name, :division_ref, :part_ref)
		");
		
		$result = $statement->execute(
			array(
				':subdivision_code'	         =>	$_POST["subdivision_code"],
				':subdivision_name'	         =>	$_POST["subdivision_name"],	
				':division_ref'	     		 =>	$_POST["division_ref"],
				':part_ref'	                 =>	$_POST["part_ref"]
			)
		);
		if(!empty($result))
		{
			echo 'เพิ่มข้อมูล ฝ่าย  สำเร็จ!';
		}
	}


	if($_POST["operation"] == "Update")
	{
		
		$statement = $connection->prepare(
			"UPDATE tbl_subdivision SET subdivision_code = :subdivision_code, subdivision_name = :subdivision_name, division_ref = :division_ref, part_ref =:part_ref
			WHERE subdivision_id = :subdivision_id"
		);

		$result = $statement->execute(
			array(
				':subdivision_code'	    =>	$_POST["subdivision_code"],
				':subdivision_name'	    =>	$_POST["subdivision_name"],
				':division_ref'       	=>	$_POST["division_ref"],
				':part_ref'	            =>	$_POST["part_ref"],
                ':subdivision_id'	    =>	$_POST["subdivision_id"]
			
			)
		);
		if(!empty($result))
		{
			echo 'แก้ไขข้อมูล สำนัก / กอง  สำเร็จ!';
		}
	}
}

?>
