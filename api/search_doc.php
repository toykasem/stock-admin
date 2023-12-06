<?php
$keyword = $_POST['keyword'];
include('db.php');
$statement = $connection->prepare("SELECT * FROM internal_memo where doc_topic like '%$keyword%' OR department like '%$keyword%' OR section like '%$keyword%'");
$statement->execute();
$result = $statement->fetchAll( PDO::FETCH_ASSOC );
//return json_encode(array('data'=>$result), JSON_UNESCAPED_UNICODE);
if($result){
  echo json_encode(array('data'=>$result), JSON_UNESCAPED_UNICODE);
}else{
  echo "ไม่มีข้อมูลตรงกับที่คำที่ท่านค้น";
}
 

?>