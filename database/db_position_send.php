<?php
    include('../config/pdo_connect.php');
	$statement = $connection->prepare("SELECT * FROM tbl_positions");
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($result , JSON_UNESCAPED_UNICODE);
    
        // $servername = 'localhost';
        // $username = 'root';
        // $password = '';
        // $dbname = "stock-admin";
        // $connection = mysqli_connect($servername, $username, $password, $dbname);

        // // Check connection
        // if(!$connection){
        //     die('Database connection error : ' .mysql_error());
        // }

        // $sql = "SELECT * FROM tbl_positions";

        // $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

        // //create an array
        // $techarray = array();
        // while($row =mysqli_fetch_assoc($result)){
        //     $techarray[] = $row;
        // }

        // echo json_encode($techarray, JSON_UNESCAPED_UNICODE);
?> 