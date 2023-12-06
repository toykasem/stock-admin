<?php
include('../config/pdo_connect.php');
//include('function.php');
if(isset($_POST["id"]))
{
	$exit = array();
	
	$statement = $connection->prepare(
		"SELECT * FROM tbl_withdraw_log
		 WHERE id = '".$_POST["id"]."' 
		 LIMIT 1"
	);
	
	$statement->execute();
	$result = $statement->fetchAll();
	
	foreach($result as $line)
	{
		$exit["id"] = $line["id"];
		$exit["withdraw_id"] = $line["withdraw_id"];
		$exit["withdraw_mat"] = $line["withdraw_mat"];
		$exit["withdraw_qty"] = $line["withdraw_qty"];
		$exit["user"] = $line["user"];
	
	}
	echo json_encode($exit , JSON_UNESCAPED_UNICODE);
	
}
?>