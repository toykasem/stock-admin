<?php
include('../config/pdo_connect.php');
//include('function.php');
if(isset($_POST["id"]))
{
	$exit = array();
	
	$statement = $connection->prepare(
		"SELECT * FROM tbl_mat
		 WHERE id = '".$_POST["id"]."' 
		 LIMIT 1"
	);
	
	$statement->execute();
	$result = $statement->fetchAll();
	
	foreach($result as $line)
	{
		$exit["id"] = $line["id"];
		$exit["mat_code"] = $line["mat_code"];
		$exit["mat_name"] = $line["mat_name"];
		$exit["price"] = $line["price"];
	
	}
	echo json_encode($exit , JSON_UNESCAPED_UNICODE);
	
}
?>