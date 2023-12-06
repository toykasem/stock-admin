<?php
include('../config/pdo_connect.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		
		$statement = $connection->prepare("
			INSERT INTO tbl_division (division_code, division_name, division_initials) 
			VALUES (:division_code, :division_name, :division_initials)
		");
		
		$result = $statement->execute(
			array(
				':division_code'	         =>	$_POST["division_code"],
				':division_name'	         =>	$_POST["division_name"],
				':division_initials'	     =>	$_POST["division_initials"]	
			)
		);
		if(!empty($result))
		{
			echo 'เพิ่มข้อมูล สำนัก / กอง  สำเร็จ!';
		}
	}


	if($_POST["operation"] == "Update")
	{
		
		$statement = $connection->prepare(
			"UPDATE tbl_division SET division_code = :division_code, division_name = :division_name, division_initials = :division_initials WHERE division_id = :id"
		);

		$result = $statement->execute(
			array(
				':division_code'	    =>	$_POST["division_code"],
				':division_name'	    =>	$_POST["division_name"],
				':division_initials'	=>	$_POST["division_initials"],
                ':id'	                =>	$_POST["division_id"]
			
			)
		);
		if(!empty($result))
		{
			echo 'แก้ไขข้อมูล สำนัก / กอง  สำเร็จ!';
		}
	}
}

?>
