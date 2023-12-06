<?php
include('../config/pdo_connect.php');
//include('function.php');
if(isset($_POST["fine_id"]))
{
	$exit = array();
	
	$statement = $connection->prepare(
		"SELECT * FROM `tbl_subdivision` JOIN tbl_division ON tbl_subdivision.division_ref = tbl_division.division_code
		 WHERE subdivision_id = '".$_POST["fine_id"]."' 
		 LIMIT 1"
	);
	
	$statement->execute();
	$result = $statement->fetchAll();
	
	foreach($result as $line)
	{
		$exit["subdivision_id"] = $line["subdivision_id"];
		$exit["subdivision_code"] = $line["subdivision_code"];
		$exit["subdivision_name"] = $line["subdivision_name"];
		//$exit["subdivision_initials"] = $line["subdivision_initials"];
		$exit["division_ref"] = $line["division_ref"];
		$exit["division_name"] = $line["division_name"];
	
	}
	echo json_encode($exit , JSON_UNESCAPED_UNICODE);
	
}
?>