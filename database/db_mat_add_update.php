<?php
include('../config/pdo_connect.php');
$response = array();
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		
		$statement = $connection->prepare("
			INSERT INTO tbl_mat (mat_code, mat_name, price) 
			VALUES (:mat_code, :mat_name, :price)
		");
		
		$result = $statement->execute(
			array(
				':mat_code'	         =>	$_POST["mat_code"],
				':mat_name'	         =>	$_POST["mat_name"],
				':price'	     =>	$_POST["price"]	
			)
		);
		if(!empty($result)){
		     // $name == $_POST["mat_name"];
		      //if($result===true){ 
            			$response['status'] = 1; 
						$response['message'] = 'เพิ่มข้อมูลสำเร็จ!'; 
						$response['icon'] = 'success'; 
					
					} else{
						$response['status'] = 0; 
						$response['message'] = 'การเพิ่มข้อมูลเหลว!'; 
						$response['icon'] = 'error'; 

					}
						
			// Return response 
			echo json_encode($response, JSON_UNESCAPED_UNICODE);


	}


	if($_POST["operation"] == "Update")
	{
		
		$statement = $connection->prepare(
			"UPDATE tbl_mat SET mat_code = :mat_code, mat_name = :mat_name, price = :price WHERE id = :id"
		);

		$result = $statement->execute(
			array(
				':mat_code'	    =>	$_POST["mat_code"],
				':mat_name'	    =>	$_POST["mat_name"],
				':price'	    =>	$_POST["price"],
                ':id'	        =>	$_POST["id"]
			
			)
		);
		if(!empty($result)){
			//if($result===true){ 
					  $response['status'] = 1; 
					  $response['message'] = 'ปรับปรุงข้อมูลสำเร็จ!'; 
					  $response['icon'] = 'success'; 
				  
				  } else{
					  $response['status'] = 0; 
					  $response['message'] = 'ปรับปรุงข้อล้มเหลว!'; 
					  $response['icon'] = 'error'; 

				  }
					  
		  // Return response 
		  echo json_encode($response, JSON_UNESCAPED_UNICODE);
	}
}

?>
