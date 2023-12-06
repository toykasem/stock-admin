<?php
include('../config/pdo_connect.php');
//include('function.php');
if(isset($_POST["user_id"]))
{
	$exit = array();
	
	$statement = $connection->prepare(
		"SELECT * FROM user_login 
		WHERE id = '".$_POST["user_id"]."' 
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