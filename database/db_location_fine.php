<?php
include('pdo_function/db.php');
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
		
		}
	echo json_encode($exit , JSON_UNESCAPED_UNICODE);
	
}
?>