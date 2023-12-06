<?php
include('../config/connect.php');
$sql = "SELECT * FROM tbl_section WHERE subdivision_ref={$_GET['section_ref']}";
$query = mysqli_query($conn, $sql);

$json = array();
while($result = mysqli_fetch_assoc($query)) {    
    array_push($json, $result);
}
echo json_encode($json, JSON_UNESCAPED_UNICODE);
?>