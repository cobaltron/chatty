<?php 
date_default_timezone_set("Asia/Calcutta");
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING & ~E_DEPRECIATED);

$host="localhost";
$user="root";
$password="Rala001*";
$db="galleria";
 $connect= mysql_connect("$host", "$user" , "$password") or die("could not connect to server");
 mysql_select_db("$db" , $connect) or die("could not connect to database");
 ?>