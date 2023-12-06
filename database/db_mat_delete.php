<?php
$response = array();
include('../config/pdo_connect.php');
//include('db.php');

// "DELETE FROM `point_job` WHERE `point_job`.`id` = 17"?
		$statement = $connection->prepare(
			"DELETE FROM tbl_mat WHERE id = :id"
		);

		$result = $statement->execute(
			array(
				':id'			=>	$_POST["id_delete"]
			)
		);

		if($result===true){ 
            $response['status'] = 1; 
            $response['message'] = 'ลบข้อมูลสำเร็จแล้ว!'; 
            $response['icon'] = 'success'; 
        
        } else{
            $response['status'] = 0; 
            $response['message'] = 'ลบข้อมูลสำเร็จแล้ว!'; 
            $response['icon'] = 'error'; 

        }
            
// Return response 
echo json_encode($response, JSON_UNESCAPED_UNICODE);


?>
	
