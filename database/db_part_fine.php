<?php
include('../config/pdo_connect.php');
//include('function.php');
if(isset($_POST["part_id"]))
{
	$exit = array();
	
	$statement = $connection->prepare(
		"SELECT * FROM tbl_part join tbl_division on tbl_part.division_ref = tbl_division.division_code
		 WHERE part_id = '".$_POST["part_id"]."' 
		 LIMIT 1"
	);
	
	$statement->execute();
	$result = $statement->fetchAll();
	
	foreach($result as $line)
	{
		$exit["part_id"] = $line["part_id"];
		$exit["part_code"] = $line["part_code"];
		$exit["part_name"] = $line["part_name"];
		$exit["division_ref"] = $line["division_ref"];
		$exit["division_code"] = $line["division_code"];
		$exit["division_name"] = $line["division_name"];
	
	}
	echo json_encode($exit , JSON_UNESCAPED_UNICODE);
	
}
?>