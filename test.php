<?php 
include('config.php');
$con=new mysqli($host, $user, $password, $db);

if($con->connect_errno)
 {
 	die('Connect Error:' .$con->connect_errno);
 }

$sql="select * from userlog";
$result=$con->query($sql) or die($con->error.__LINE__);

?>
<table style="border: 1px solid black;">
<tr><th>Name</th><th>Email</th><th>Password</th></tr>
<?php
while($row=$result->fetch_assoc())
{
	
	?>
<tr><td><?php echo $row['username']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['password']; ?></td>
</tr>
	<?php
}

 ?>
 </table>