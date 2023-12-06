<?php
include('../config/pdo_connect.php');
$response = array();

if(isset($_POST["operation"])){

			if($_POST["operation"] == "Add"){
				
						$statement = $connection->prepare("
							INSERT INTO tbl_positions (position_code, position_name) 
							VALUES (:position_code, :position_name)
						");
						
						$result = $statement->execute(
							array(
								':position_code'	  =>	$_POST["position_code"],
								':position_name'	  =>	$_POST["position_name"]	
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
			"UPDATE tbl_positions SET position_code = :position_code, position_name = :position_name  WHERE position_id = :id"
		);

		$result = $statement->execute(
			array(
				':position_code'	  =>	$_POST["position_code"],
				':position_name'	  =>	$_POST["position_name"],
                ':id'	              =>	$_POST["position_id"]
			
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
