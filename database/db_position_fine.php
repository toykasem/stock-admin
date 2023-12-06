<?php
include('../config/pdo_connect.php');
//include('function.php');
if(isset($_POST["position_id"]))
{
	$exit = array();
	
	$statement = $connection->prepare(
		"SELECT * FROM tbl_positions 
		 WHERE position_id = '".$_POST["position_id"]."' 
		 LIMIT 1"
	);
	
	$statement->execute();
	$result = $statement->fetchAll();
	
	foreach($result as $line)
	{
		$exit["position_id"] = $line["position_id"];
		$exit["position_code"] = $line["position_code"];
		$exit["position_name"] = $line["position_name"];
		
	
	}
	echo json_encode($exit , JSON_UNESCAPED_UNICODE);
	
}
?>