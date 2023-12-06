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
                // Get row data
                $contract_no   = $line[0];
                $user_upload   = $line[1];
                $date_upload   = $line[2];
                $file_name     = $line[3];
                
                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT contract_no FROM doc_acceptance WHERE contract_no = '".$line[0]."'";
                $prevResult = $db->query($prevQuery);
                
                if($prevResult->num_rows > 0){
                    // Update member data in the database
                    $db->query("UPDATE doc_acceptance SET contract_no = '".$contract_no."', user_upload = '".$user_upload."', date_upload =  NOW(), file_name = '".$file_name."',  WHERE contract_no = '".$contract_no."'");
                }else{
                    // Insert member data in the database
                    $db->query("INSERT INTO doc_acceptance (contract_no, user_upload, date_upload, file_name) VALUES ('".$contract_no."', '".$user_upload."', NOW(), '".$file_name."')");
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
header("Location:../../../?page=ImportAcceptance".$qstring);
?>