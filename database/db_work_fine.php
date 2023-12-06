<?php
include('../config/pdo_connect.php');
//include('function.php');
if(isset($_POST["work_id"]))
{
	$exit = array();
	
	$statement = $connection->prepare(
		"SELECT `work_id`, `work_code`, `work_name`, `subdivision_name`, `part_name`, `division_name` 
		 FROM `tbl_work` 
		 JOIN tbl_subdivision ON tbl_work.subdivision_ref = tbl_subdivision.subdivision_code 
		 JOIN tbl_part ON tbl_work.part_ref=tbl_part.part_code
		 JOIN tbl_division ON tbl_work.division_ref = tbl_division.division_code
		 WHERE work_id = '".$_POST["work_id"]."' "
	);
	
	$statement->execute();
	$result = $statement->fetchAll();
	
	foreach($result as $line)
	{
		$exit["work_id"] = $line["work_id"];
		$exit["work_code"] = $line["work_code"];
		$exit["work_name"] = $line["work_name"];
		$exit["subdivision_name"] = $line["subdivision_name"];
		$exit["part_name"] = $line["part_name"];
		$exit["division_name"] = $line["division_name"];
	
	}
	echo json_encode($exit , JSON_UNESCAPED_UNICODE);
	
}
?>