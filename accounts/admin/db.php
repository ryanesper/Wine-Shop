<?php

$host="localhost";
$username="root";
$password="";
$db_name="onlineshop";

mysql_connect($host,$username,$password) or die("Database not connect");
mysql_select_db($db_name) or die("could not connect database");
error_reporting('E_ERROR!E_WORNING');

?>