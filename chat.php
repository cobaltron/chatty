<?php 

session_start();
//echo $_SESSION['loggedin'];
if(strcmp($_SESSION['loggedin'],"yes")!=0)
{
	header('location:index.html');
}

include('config.php');
$con=new mysqli($host, $user, $password, $db);
 if($con->connect_errno)
 {
 	die('Connect Error:' .$con->connect_errno);
 }

$sender=$_SESSION['uid'];
$message=$_REQUEST['msg'];
$receiver=$_REQUEST['receiver'];
$timelog=strtotime("now");

$sql="insert into chat(sender,receiver,timelog,message) values('$sender','$receiver', $timelog, '$message')";
$con->query($sql) or die($con->error.__LINE__);


 ?>
<div align="right">
	<p><?php echo $message; ?> </p>

</div>
