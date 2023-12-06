<?php
// Load the database configuration file
include_once 'connection_import.php';
$response = array();

if(isset($_POST['importSubmit'])){
    
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data   `id`, `regis_date`, `contract_no`, `contractor`, `garanty_type`, `cost_budget`, `project_name`, `status`, `garanty_end`, `owner`
                $regis_date            = $line[0];
                $contract_no           = $line[1];
                $contractor            = $line[2];
                $garanty_type          = $line[3];
                $cost_budget           = $line[4];
                $project_name          = $line[5];
                $status                = $line[6];
                $garanty_end           = $line[7];
                $owner                 = $line[8];
                
                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT contract_no FROM tbl_treasury WHERE contract_no = '".$line[1]."'";
                $prevResult = $db->query($prevQuery);
                
                if($prevResult->num_rows > 0){
                    // Update member data in the database  
                    $db->query("UPDATE tbl_treasury 
                                SET regis_date   = '".$regis_date."', 
                                    contractor   = '".$contractor."', 
                                    garanty_type = '".$garanty_type."', 
                                    cost_budget = '".$cost_budget."', 
                                    project_name = '".$project_name."', s
                                    tatus = '".$status."', 
                                    garanty_end = '".$garanty_end."', 
                                    owner = '".$owner."' 
                                WHERE contract_no = '".$contract_no."'
                            ");
                }else{
                    // Insert member data in the database
                    $db->query("INSERT INTO tbl_treasury (regis_date, contract_no, contractor, garanty_type, cost_budget, project_name, status, garanty_end, owner) 
                    VALUES ('".$regis_date."', '".$contract_no."', '".$contractor."', '".$garanty_type."', '".$cost_budget."', '".$project_name."', '".$status."', '".$garanty_end."', '".$owner."')");
                }
            }
            
            // Close opened CSV file
            fclose($csvFile);
            $response['status'] = 1; 
			$response['message'] = 'success!'; 
            $qstring = '&status=succ';
        }else{
            $response['status'] = 2; 
			$response['message'] = 'Error!'; 
            $qstring = '&status=err';
        }
    }else{
        $response['status'] = 3 ; 
		$response['message'] = 'Invalid File!'; 
        $qstring = '&status=invalid_file';
    }
}
//echo json_encode($response, JSON_UNESCAPED_UNICODE);
// Redirect to the listing page
header("Location:../../../?page=Import-treasury".$qstring);
?>