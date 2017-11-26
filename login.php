<?php 

include('config.php');
$con=new mysqli($host, $user, $password, $db);
 if($con->connect_errno)
 {
 	die('Connect Error:' .$con->connect_errno);
 }

$nam=trim($_REQUEST['form-username']);
$pass=trim($_REQUEST['form-password']);


$sql="SELECT * FROM userlog WHERE username='$nam' AND password='$pass' ";

$result=$con->query($sql) or die($con->error.__LINE__);
$num=$result->num_rows;
echo $num;
if($num==0)
{
	//var_dump($result);
	header('location:index.html');

}
else
	{	

		session_start();
		$row=$result->fetch_assoc();
		$userid=$row['userid'];
		$_SESSION['uid']=$userid;
		$_SESSION['loggedin']="yes";
		header('location:dashboard.php');
	}

 ?>