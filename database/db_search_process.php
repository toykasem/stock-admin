<?php

include('../config/pdo_connect.php');
$exit = array();


if (isset($_GET['database'])) {
                    $database = $_GET['database'];
             } else {
                 // $database = 'database';
                    $database = '';
         }
switch ($database) {

case "":
                $database_name = 'service_contract';
                $title = "รายละเอียดโครงการและเงินประกันสัญญา";
               
                $query .= "SELECT * FROM service_contract ";
                
                $statement = $connection->prepare($query);
                $statement->execute();	
                $result = $statement->fetchAll();
                
                $data = array();
                
                
                foreach($result as $row)
                {
                   
                    $sub_array = array();
                    $sub_array[] = $row["id"];
                    $sub_array[] = $row["contract_id"];
                    $sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-xs update">Update</button>';
                    $sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-xs delete">Delete</button>';
                    $data[] = $sub_array;
                    
                }


             
                
                 break;

                
    
            case "1":
                $database_name = 'doc_acceptance';
                $title = "รายการเอกสารตรวจรับงาน";
                break;

            case "2":
                $database_name = 'doc_acceptance';
                $title = "รายการเอกสารตรวจรับงาน";
                break;
            
            case "3":
                $database_name = 'internal_memo';
                $title = "บึกทึกข้อความภายในหน่วยงาน";
                break;

}

?>
