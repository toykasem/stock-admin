<?php
include('../config/connect.php');
$sql = "SELECT * FROM tbl_part WHERE division_ref={$_GET['division_ref']}";
$query = mysqli_query($conn, $sql);

$json = array();
while($result = mysqli_fetch_assoc($query)) {    
    array_push($json, $result);
}
echo json_encode($json, JSON_UNESCAPED_UNICODE);
?>