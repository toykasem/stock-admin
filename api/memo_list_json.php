<?php 
include('db.php');
$statement = $connection->prepare("SELECT * FROM internal_memo");
$statement->execute();
$result = $statement->fetchAll( PDO::FETCH_ASSOC );
//return json_encode(array('data'=>$result), JSON_UNESCAPED_UNICODE);

 echo json_encode(array('data'=>$result), JSON_UNESCAPED_UNICODE);


?>