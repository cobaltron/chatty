<?php 
include('config.php');
$name=trim($_REQUEST['form-name']);
$email=trim($_REQUEST['form-email']);
$pass=trim($_REQUEST['form-pass']);
$userid=uniqid();
if(strlen($name)==0 || strlen($email)==0 || strlen($pass)==0)
{
	
	header('location:index.html');

}
else{

 $con=new mysqli($host, $user, $password, $db);
 if($con->connect_errno)
 {
 	die('Connect Error:' .$con->connect_errno);
 }
$sql="insert into userlog(userid,username,email,password) values('$userid','$name', '$email', '$pass')";
$con->query($sql) or die($con->error.__LINE__);
header('location:dashboard.php');

}


 ?>