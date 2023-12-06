<?php

// $user = 'root';
// $password = '1234';
// $connection = new PDO( 'mysql:host=localhost;dbname=engineeringdb', $user, $password );

//Server
// $user = 'rangsit_engineer';
 //$password = 'Eng!n33r';


//Local
$user = 'root';
$password = '';

$connection = new PDO( 'mysql:host=localhost;dbname=rangsit_engineer', $user, $password );
$connection->exec("set names utf8");



?>