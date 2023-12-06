<?php
echo 	$_POST["user_id"];
echo 	"<br>".$_POST["user_prefix"];
echo 	"<br>".$_POST["user_fname"];
echo 	"<br>".$_POST["user_lname"];
echo 	"<br>".$_POST["user_position"];
echo 	"<br>".$_POST["password"];
echo 	"<br>".$_POST["user_email"];
echo 	"<br>".$_POST["tel"];

echo "<br>".$_POST["division_ref"];
echo "<br>".$_POST["part_ref"];
echo "<br>".$_POST["division_ref"];
echo "<br>".$_POST["section_ref"];
$id=$_POST["user_id"];
include('../config/pdo_connect.php');


	//if($_POST["operation"] == "Update")
	//{
		
		$statement = $connection->prepare(
			"UPDATE user_login SET prefix = :user_prefix, 
								   firstname = :user_fname, 
								   lastname = :lastname, 
								   username = :username, 
								   password = :password, 
								   email = :email, 
								   tel = :tel,
								   user_level = :user_level,
								   position = :position,
								   division=:division,
								   part=:part,
								   subdivision =:subdivision,
								   section =:section  
							WHERE  id = $id"
		);

		$result = $statement->execute(
			array(
				':prefix'		=>	$_POST["user_prefix"],
				':firstname'	=>	$_POST["user_fname"],
				':lastname'	    =>	$_POST["user_lname"],
				':username'	    =>	$_POST["username"],
				':password'	    =>	$_POST["password"],
				':email'	    =>	$_POST["user_email"],
				':tel'	        =>	$_POST["tel"],
				':user_level'	=>	$_POST["user_level"],
				':position'	    =>	$_POST["user_position"],
				':division'	    =>	$_POST["division_ref"],
				':part'	    	=>	$_POST["part_ref"],
				':subdivision'  =>	$_POST["subdivision_ref"],
				':section'	    =>	$_POST["section_ref"],
				
			)
		);

		if(!empty($result))
		{
			echo 'user Update sucessful !';
		}
	//}


?>
