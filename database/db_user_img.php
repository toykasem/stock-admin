<?php
include('../config/pdo_connect.php');
if(isset($_POST["operation"]))
{

	if($_POST["operation"] == "Update")
	{
		
		$statement = $connection->prepare(
			"UPDATE user_login SET img = :img WHERE id = :id"
		);

		$result = $statement->execute(
			array(
				':img'	=>	$_POST["img"],
				':id'	=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo ' เพิ่มรูปภาพสำเร็จ !';
		}
	}
}

?>
