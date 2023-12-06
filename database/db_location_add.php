<?php
session_start();
$response = array();

$location_code=$_POST['location_code'];
$location_name=$_POST['location_name'];
$location_detail=$_POST['location_detail'];
$LAT=$_POST['LAT'];
$LNG=$_POST['LNG'];
$division_ref=$_POST['division_ref'];
$part_ref=$_POST['part_ref'];
$subdivision_ref=$_POST['subdivision_ref'];
$section_ref=$_POST['section_ref'];
//$creation_by = $_SESSION["username"];

echo $location_code."<br/>";
echo $location_name."<br/>";
echo $location_detail."<br/>";
echo $LAT."<br/>";
echo $LNG."<br/>";
echo $division_ref."<br/>";
echo $part_ref."<br/>";
echo $subdivision_ref."<br/>";
echo $section_ref."<br/>";
//echo $creation_by;


include('pdo_function/db.php');
include('pdo_function/function.php');



	$statement = $connection->prepare("
	INSERT INTO `tbl_location` (`location_code`, `location_name`, `location_detail`, `LAT`, `LNG`, `division_ref`, `part_ref`, `subdivision_ref`, `section_ref`) 
	VALUES (:location_code, :location_name, :location_detail, :LAT, :LNG, :division_ref, :part_ref, :subdivision_ref, :section_ref);
	");
		
		$result = $statement->execute(
			array(
				':location_code'         =>	$location_code,
				':location_name'         =>	$location_name,
				':location_detail'       =>	$location_detail,
                ':LAT'  				 =>	$LAT,
                ':LNG'          	     => $LNG,
                ':division_ref'          => $division_ref,
                ':part_ref'              => $part_ref,
                ':subdivision_ref'       => $subdivision_ref,
				':section_ref'           =>	$section_ref
				
			)
		);
		if($result===true){ 
			$response['status'] = 1; 
			$response['message'] = 'เพิ่มข้อมูลสำเร็จ!'; 
			//$response['icon'] = 'success!'; 
		   
		   } else{
			$response['status'] = 0; 
			$response['message'] = 'เพิ่มข้อมูลล้มเหลว!'; 
			//$response['icon'] = 'error!'; 
   
		   }
			   
   // Return response 
   //echo json_encode($response);
   echo json_encode($response, JSON_UNESCAPED_UNICODE);


?>


?>

