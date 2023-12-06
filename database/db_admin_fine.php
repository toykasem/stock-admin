<?php
include('../config/pdo_connect.php');
//include('function.php');
if(isset($_POST["admin_id"]))
{
	$exit = array();
	
	$statement = $connection->prepare(
		"SELECT * FROM admin_login
		JOIN tbl_positions ON admin_login.position = tbl_positions.position_code 
		WHERE admin_login.id = '".$_POST["admin_id"]."' 
		LIMIT 1"
	);
	
	$statement->execute();
	$result = $statement->fetchAll();
	
	foreach($result as $line)
	{
		$exit["id"] = $line["id"];
		$exit["firstname"] = $line["firstname"];
		$exit["lastname"] = $line["lastname"];
		$exit["username"] = $line["username"];
		$exit["password"] = $line["password"];
		$exit["email"] = $line["email"];
		$exit["tel"] = $line["tel"];
		$exit["user_level"] = $line["user_level"];
		$exit["position"] = $line["position"];
		$exit["position_name"] = $line["position_name"];
	   // $exit["img"] = $line["img"];

		// if($line["img"] != '')
		// {
		// 	$exit['img'] = '<img src="profile_img/'.$line["img"].'" class="img-thumbnail" width="200" height="100" /><input type="hidden" name="usr_img" value="'.$line["img"].'" />';
		// }
		// else
		// {
		// 	$exit['img'] = '<input type="hidden" name="usr_img" value="" />';
		// }
	}
	echo json_encode($exit , JSON_UNESCAPED_UNICODE);
	
}
?>