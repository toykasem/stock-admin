<?php
include('../config/pdo_connect.php');
if(isset($_POST["division_id"]))
{
	$exit = array();
	
	$statement = $connection->prepare(
		"SELECT * FROM tbl_division 
		 WHERE division_id = '".$_POST["division_id"]."' 
		 LIMIT 1"
	);
	
	$statement->execute();
	$result = $statement->fetchAll();
	
	foreach($result as $line)
	{
		$exit["division_id"] = $line["division_id"];
		$exit["division_code"] = $line["division_code"];
		$exit["division_name"] = $line["division_name"];
		$exit["division_initials"] = $line["division_initials"];
	
	}
	echo json_encode($exit , JSON_UNESCAPED_UNICODE);
	
}
?>