<?php
$costomer_id = $_POST["txtCustomerID"];
$costomer_name = $_POST["txtName"];
$email = $_POST["txtEmail"];
$country_code = $_POST["txtCountryCode"];
$budget = $_POST["txtBudget"];
$use = $_POST["txtUsed"];

	include '../config/mysqli_connection.php';

	// $sql = "INSERT INTO customer (CustomerID, Name, Email, CountryCode, Budget, Used) 
	// 	    VALUES ('".$_POST["txtCustomerID"]."','".$_POST["txtName"]."','".$_POST["txtEmail"]."'
	// 	   ,'".$_POST["txtCountryCode"]."','".$_POST["txtBudget"]."','".$_POST["txtUsed"]."')";
    
    $sql = "INSERT INTO customer (CustomerID, Name, Email, CountryCode, Budget, Used) 
		    VALUES ('$costomer_id','$costomer_name','$email','$country_code','$budget','$use')";
    
    $query = mysqli_query($conn,$sql);

	if($query) {
		echo json_encode(array('status' => '1','message'=> 'Record add successfully'));
	}
	else
	{
		echo json_encode(array('status' => '0','message'=> 'Error insert data!'));
	}

	mysqli_close($conn);
?>