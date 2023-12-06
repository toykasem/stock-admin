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
                $code           = $line[0];
                $name           = $line[1];
                $tel            = $line[2];
                $created        = $line[3];
                $modified       = $line[4];
                $user_modified  = $line[5];
                $status         = $line[6];
                
                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT id FROM tbl_contractor WHERE name = '".$line[1]."'";
                $prevResult = $db->query($prevQuery);
                
                if($prevResult->num_rows > 0){
                    // Update member data in the database
                    $db->query("UPDATE tbl_contractor SET code = '".$code."', tel = '".$tel."', status = '".$status."', user_modified = '".$user_modified."', modified = NOW() WHERE name = '".$name."'");
                }else{
                    // Insert member data in the database
                    $db->query("INSERT INTO tbl_contractor (code, name, tel, created, modified, user_modified, status) VALUES ('".$code."', '".$name."', '".$tel."', NOW(), NOW(), '".$user_modified."', '".$status."')");
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
header("Location:../../../?page=ImportContrac".$qstring);
?>