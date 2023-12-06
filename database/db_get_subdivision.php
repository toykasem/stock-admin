<?php
include('../config/connect.php');
$sql = "SELECT subdivision_code,subdivision_name FROM tbl_subdivision WHERE part_ref={$_GET['part_ref']}";
$query = mysqli_query($conn, $sql);

$json = array();
while($result = mysqli_fetch_assoc($query)) {    
    array_push($json, $result);
}
echo json_encode($json, JSON_UNESCAPED_UNICODE);
?>