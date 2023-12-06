<?php

function get_total_member()
{
	include('db.php');
	$statement = $connection->prepare("SELECT * FROM user_login");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}
//  ดึงค่าจำนวนเอกสารตรวจรับงาน
function get_total_doc_accep()
{
	include('db.php');
	$statement = $connection->prepare("SELECT * FROM doc_acceptance");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

function get_total_internal_memo()
{
	include('db.php');
	$statement = $connection->prepare("SELECT * FROM internal_memo");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();


}

function get_exired()
{
	include('db.php');
	$statement = $connection->prepare("SELECT *,TIMESTAMPDIFF(DAY,NOW(),`due_date`) AS DAYCount FROM `service_contract` WHERE TIMESTAMPDIFF(DAY,NOW(),`due_date`) < 1");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

function get_process()
{
	include('db.php');
	$statement = $connection->prepare("SELECT * FROM purchase_process");
	$statement->execute();
	$result = $statement->fetchAll( PDO::FETCH_ASSOC );
	return json_encode( $result, JSON_UNESCAPED_UNICODE );
}

function get_user()
{
	include('db.php');
	$statement = $connection->prepare("SELECT * FROM user");
	$statement->execute();
	$result = $statement->fetchAll( PDO::FETCH_ASSOC );
	return json_encode( $result, JSON_UNESCAPED_UNICODE );
}

	
//tbl_asset
function get_count_asset()
{
	include('db.php');
	$statement = $connection->prepare("SELECT * FROM tbl_asset");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}
  

?>