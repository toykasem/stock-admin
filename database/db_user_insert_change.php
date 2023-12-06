<?php
include('../config/pdo_connect.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		
		$statement = $connection->prepare("
			INSERT INTO user_login (firstname, lastname, username, password, email, tel, position) 
			VALUES (:firstname, :lastname, :username, :password, :email, :tel, :position)
		");
		
		$result = $statement->execute(
			array(
				':firstname'	=>	$_POST["user_fname"],
				':lastname'	    =>	$_POST["user_lname"],
				':username'	    =>	$_POST["username"],
				':password'	    =>	$_POST["password"],
				':email'	    =>	$_POST["user_email"],
				':tel'	        =>	$_POST["tel"],
				':position'	    =>	$_POST["user_position"]
				
			)
		);
		if(!empty($result))
		{
			echo 'user insert  sucessful !';
		}
	}

	if($_POST["operation"] == "Update")
	{
		
		$statement = $connection->prepare(
			"UPDATE user_login SET firstname = :firstname, lastname = :lastname, username = :username, password = :password, email = :email, 
			tel = :tel, position = :position WHERE id = :id"
		);

		$result = $statement->execute(
			array(
				':firstname'	=>	$_POST["user_fname"],
				':lastname'	    =>	$_POST["user_lname"],
				':username'	    =>	$_POST["username"],
				':password'	    =>	$_POST["password"],
				':email'	    =>	$_POST["user_email"],
				':tel'	        =>	$_POST["tel"],
				':position'	    =>	$_POST["user_position"],
				':id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'user Update sucessful !';
		}
	}
}

?>
