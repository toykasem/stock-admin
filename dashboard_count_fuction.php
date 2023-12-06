<?php
function get_total_member(){
	include('config/pdo_connect.php');
	$statement = $connection->prepare("SELECT * FROM user_login");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount(); 
}

function get_total_admin(){
	include('config/pdo_connect.php');
	$statement = $connection->prepare("SELECT * FROM admin_login");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount(); 
}

function get_total_withdraw(){
	include('config/pdo_connect.php');
	$statement = $connection->prepare("SELECT * FROM tbl_withdraw");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount(); 

}
function get_total_approved(){
	include('config/pdo_connect.php');
	$statement = $connection->prepare("SELECT * FROM `tbl_withdraw_log` where status='3' ");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount(); 
}

function get_total_waiting_approve(){
	include('config/pdo_connect.php');
	$statement = $connection->prepare("SELECT * FROM `tbl_withdraw_log` where status='1' ");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount(); 
}

function stock_emty(){
	include('config/pdo_connect.php');
	$statement = $connection->prepare("SELECT * FROM `tbl_stock` where qty='0' ");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount(); 
}



?>