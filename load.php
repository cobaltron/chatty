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

$userid = $_SESSION['uid'];
$receiver = $_REQUEST['receiver'];
$sql="SELECT * FROM chat where receiver ='$receiver' and sender='$userid'";

$result=$con->query($sql) or die($con->error.__LINE__);

while($row=$result->fetch_assoc()){
	?>
	<div align="right" ><?php echo $row['message']; ?></div><br/>
	<?php
}

$sql="SELECT * FROM chat where receiver ='$userid' and sender='$receiver'";

$result=$con->query($sql) or die($con->error.__LINE__);

while($row=$result->fetch_assoc()){
	?>
	<div align="left" ><?php echo $row['message']; ?></div><br/>
	<?php
}



?>