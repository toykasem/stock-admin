<?php
include('../config/pdo_connect.php');
$response = array();

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		
		$statement = $connection->prepare("
			INSERT INTO tbl_part (part_code, part_name, division_ref) 
			VALUES (:part_code, :part_name, :division_ref)
		");
		
		$result = $statement->execute(
			array(
				':part_code'	  =>	$_POST["part_code"],
				':part_name'	  =>	$_POST["part_name"],	
				':division_ref'	  =>	$_POST["division_ref"]
			)
		);
		if(!empty($result))
		{
			 $response['status'] = 1; 
             $response['message'] = 'เพิ่มข้อมูล ส่วน  สำเร็จ!'; 
			
		}else{
			$response['status'] = 0; 
            $response['message'] = 'เพิ่มข้อมูล ส่วน ล้มเหลว!'; 
		}
	}


	if($_POST["operation"] == "Update")
	{
		
		$statement = $connection->prepare(
			"UPDATE tbl_part SET part_code = :part_code, part_name = :part_name, division_ref =:division_ref  WHERE part_id = :id"
		);

		$result = $statement->execute(
			array(
				':part_code'	  =>	$_POST["part_code"],
				':part_name'	  =>	$_POST["part_name"],
				':division_ref'	  =>	$_POST["division_ref"],
                ':id'	          =>	$_POST["part_id"]
			
			)
		);
		if(!empty($result))
		{
			$response['status'] = 1; 
            $response['message'] = 'แก้ไขข้อมูล ส่วน  สำเร็จ!'; 

		}else{

			$response['status'] = 0; 
            $response['message'] = 'แก้ไขข้อมูล ส่วน  ล้มเหลว!';
		}
	}

	// Return response 
echo json_encode($response, JSON_UNESCAPED_UNICODE);
}

?>
