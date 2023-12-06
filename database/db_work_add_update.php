<?php
include('../config/pdo_connect.php');
$response = array();

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$statement = $connection->prepare("
			INSERT INTO tbl_work (work_code, work_name, division_ref, part_ref, subdivision_ref) 
			VALUES (:work_code, :work_name, :division_ref, :part_ref, :subdivision_ref)
		");
		
		$result = $statement->execute(
			array(
				':work_code'	  =>	$_POST["work_code"],
				':work_name'	  =>	$_POST["work_name"],
				':division_ref'	  =>	$_POST["division_ref"],	
				':part_ref'	      =>	$_POST["part_ref"],
				':subdivision_ref'=>	$_POST["subdivision_ref"]
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
		//UPDATE `tbl_section` SET `work_id` = '61', `work_code` = 'W061', `work_name` = 'งานเครื่องจักรกล11', `division_ref` = '9001', `part_ref` = 'P0021', `subdivision_ref` = 'SD021' WHERE `tbl_section`.`work_id` = 6;
		$statement = $connection->prepare(
			"UPDATE tbl_work SET work_code = :work_code, work_name = :work_name, division_ref = :division_ref, part_ref =:part_ref, subdivision_ref =:subdivision_ref  WHERE  WHERE tbl_work.work_id = :id"
		);

		$result = $statement->execute(
			array(
				':work_code'	         =>	$_POST["work_code"],
				':work_name'   	         =>	$_POST["work_name"],
				':division_ref'	         =>	$_POST["division_ref"],
				':part_ref'	             =>	$_POST["part_ref"],
				':subdivision_refrt_ref' =>	$_POST["subdivision_ref"],
                ':id'	                 =>	$_POST["work_id"]
			
			)
		);
		if(!empty($result))
		{
			$response['status'] = 1; 
            $response['message'] = 'แก้ไขข้อมูล งาน  สำเร็จ!'; 

		}else{

			$response['status'] = 0; 
            $response['message'] = 'แก้ไขข้อมูล งาน  ล้มเหลว!';
		}
	}

	// Return response 
echo json_encode($response, JSON_UNESCAPED_UNICODE);
}

?>
