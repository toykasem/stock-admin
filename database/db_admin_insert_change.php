<?php
include('../config/pdo_connect.php');

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		
		$statement = $connection->prepare("
			INSERT INTO admin_login (firstname, lastname, username, password, email, tel, position) 
			VALUES (:firstname, :lastname, :username, :password, :email, :tel, :position)
		");
		
		$result = $statement->execute(
			array(
				':firstname'	  =>	$_POST["user_fname"],
				':lastname'	      =>	$_POST["user_lname"],
				':username'	      =>	$_POST["username"],
				':password'	      =>	$_POST["password"],
				':email'	      =>	$_POST["user_email"],
				':tel'	          =>	$_POST["tel"],
				':position'       =>	$_POST["position"]
				
			)
		);
		$response = array();
		if(!empty($result))
		{
			 $response['status'] = 1; 
             $response['message'] = 'เพิ่มข้อมูล Admin  สำเร็จ!'; 
			 $response['icon'] = 'success'; 
			
		}else{
			$response['status'] = 0; 
            $response['message'] = 'เพิ่มข้อมูล Admin ล้มเหลว!'; 
			$response['icon'] = 'error'; 

		}
		echo json_encode($response, JSON_UNESCAPED_UNICODE);

	}

	if($_POST["operation"] == "Update")
	{
		
		$statement = $connection->prepare(
			"UPDATE admin_login SET firstname = :firstname, lastname = :lastname, username = :username, password = :password, email = :email, 
			tel = :tel, position = :position WHERE id = :id"
		);

		$result = $statement->execute(
			array(
				':firstname'	        =>	$_POST["user_fname"],
				':lastname'	            =>	$_POST["user_lname"],
				':username'	            =>	$_POST["username"],
				':password'	            =>	$_POST["password"],
				':email'	            =>	$_POST["user_email"],
				':tel'	                =>	$_POST["tel"],
				':position'	            =>	$_POST["position"],
				':id'			        =>	$_POST["admin_id"]
			)
		);
		$response = array();
		if(!empty($result))
		{
			 $response['status'] = 1; 
             $response['message'] = 'แก้ไขข้อมูล Admin  สำเร็จ!';
			 $response['icon'] = 'success';  
			
		}else{
			$response['status'] = 0; 
            $response['message'] = 'แก้ไขเพิ่มข้อมูล Admin ล้มเหลว!'; 
			$response['icon'] = 'error'; 

		}
		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	}
}

?>
