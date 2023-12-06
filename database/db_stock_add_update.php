<?php
include('../config/pdo_connect.php');
$response = array();
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		
		$statement = $connection->prepare("
			INSERT INTO tbl_stock (mat_code, qty, unit_code) 
			VALUES (:mat_code, :qty, :unit_code)
		");
		
		$result = $statement->execute(
			array(
				':mat_code'	         =>	$_POST["mat_code"],
				':qty'	             =>	$_POST["qty"],
				':unit_code'	     =>	$_POST["unit_code"]
			)
		);
		// if(!empty($result))
		// {
		// 	echo 'เพิ่มข้อมูลวัสดุสำเร็จ!';
		// }

		
		if($result===true){ 
            $response['status'] = 1; 
            $response['message'] = 'เพิ่มข้อมูลสำเร็จแล้วจ้า!'; 
            $response['icon'] = 'success'; 
        
        } else{
            $response['status'] = 0; 
            $response['message'] = 'การเพิ่มข้อล้มเหลว!'; 
            $response['icon'] = 'error'; 

        }
            
// Return response 
echo json_encode($response, JSON_UNESCAPED_UNICODE);

	}


	if($_POST["operation"] == "Update")
	{
		
		$statement = $connection->prepare(
			"UPDATE tbl_stock SET mat_code = :mat_code, qty = :qty, unit_code = :unit_code WHERE id = :id"
		);

		$result = $statement->execute(
			array(
				':mat_code'	    =>	$_POST["mat_code"],
				':qty'	        =>	$_POST["qty"],
				':unit_code'	=>	$_POST["unit_code"],
                ':id'	        =>	$_POST["id"]
			
			)
		);
		if($result===true){ 
            $response['status'] = 1; 
            $response['message'] = 'ปรับปรุงมูลสำเร็จแล้วจ้า!'; 
            $response['icon'] = 'success'; 
        
        } else{
            $response['status'] = 0; 
            $response['message'] = 'ปรับปรุงมูลล้มเหลว!'; 
            $response['icon'] = 'error'; 

        }
            
// Return response 
echo json_encode($response, JSON_UNESCAPED_UNICODE);

	}
}

?>
