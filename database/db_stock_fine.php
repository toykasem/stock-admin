<?php
include('../config/pdo_connect.php');
//include('function.php');
if(isset($_POST["id"]))
{
	$exit = array();
	
	$statement = $connection->prepare(
		"SELECT tbl_stock.id, tbl_stock.mat_code,tbl_mat.mat_name, tbl_stock.qty, tbl_stock.unit_code,tbl_unit.unit_name    FROM tbl_stock
		 JOIN tbl_mat ON tbl_stock.mat_code=tbl_mat.mat_code
		 JOIN tbl_unit ON tbl_stock.unit_code=tbl_unit.unit_code
		 WHERE tbl_stock.id = '".$_POST["id"]."' 
		 LIMIT 1"
	);
	
	$statement->execute();
	$result = $statement->fetchAll();
	
	foreach($result as $line)
	{
		$exit["id"] = $line["id"];
		$exit["mat_code"] = $line["mat_code"];
		$exit["mat_name"] = $line["mat_name"];
		$exit["qty"] = $line["qty"];
		$exit["unit_code"] = $line["unit_code"];
		$exit["unit_name"] = $line["unit_name"];
	}
	echo json_encode($exit , JSON_UNESCAPED_UNICODE);
	
}
?>