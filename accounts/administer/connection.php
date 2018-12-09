<?php

$hostname = "localhost";
$user = "root";
$pw = "esper";
$dbname = "onlineshop";


try
 {
   $conn = new PDO('mysql:host = '.$hostname.'; dbname='.$dbname, $user,$pw);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   //echo 'Connection Succesful';
 }
catch(PDOException $err)
 {
   $err->getMessage();
   echo $err;
 }
?>