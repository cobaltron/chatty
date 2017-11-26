<?php  

//echo "chatty";
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
$sql="SELECT * FROM userlog ";

$result=$con->query($sql) or die($con->error.__LINE__);

?>

<!DOCTYPE html>
<html lang="en">

    <head>
    	<script src="Source/bootstrap-login-register-forms/form-2/assets/js/jquery-1.11.1.min.js"></script>
        <script src="Source/bootstrap-login-register-forms/form-2/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="Source/bootstrap-login-register-forms/form-2/assets/js/jquery.backstretch.min.js"></script>
        <script src="Source/bootstrap-login-register-forms/form-2/assets/js/scripts.js"></script>
        
    </head>

       <body>
       <div align="center">
       			
       	</div>
       	<div style="background-color:lightgrey;width:600px;"><h1>chatty</h1></div>
       	
       	<div>

       		<select id="user" onchange="loadmsg()">
  					<option value="0">SELECT USER</option>
  					<?php 
  						while($row=$result->fetch_assoc())
  						{
  							?>
  							<option value="<?php echo $row['userid']; ?>"><?php echo $row['username']; ?></option>
  							<?php
  						}

  					?>
  					
			</select>
			<a href="logout.php" style=""> LOG OUT</a>
			
		</div>
       <div>
       <div id="load" style="border:1px solid gray;width:600px;height:450px;"></div>
       <br>

       	<input type="text" id="msg" placeholder="Enter your message..." style="width:550px;height:50px;border: 2px solid lightgrey;padding: 12px 20px;margin: 8px 0;box-sizing: border-box;">
       	
       	<button type="Button" onclick="sendmsg()" style="background-color: #4CAF50;height:50px;border: none;color: white;"> SEND </button>
       	</div>
       
       	
<script type="text/javascript">
		
		function sendmsg()
		{
		var msg=$("#msg").val();
		var receiver=$("#user option:selected").val();
		console.log(msg);
		console.log(receiver);
		//alert(comp)
		if(msg!="")
		{
			$.ajax({
				type:"GET",
				url:"chat.php",
				cache:false,
				data: {
					"msg":msg,
					"receiver":receiver
				},

				beforeSend:function(){
					//alert(comp);
					console.log("Data sent");


				},
				dataType:"html",
				success:function(html)
				{
					//alert(data);
					
					$("#load").append(html);
				}
			});
		}
	}
	function loadmsg(){
		//loadagain();
		var receiver = $("#user option:selected").val();
		if(receiver=="0"){
			alert("PLease select proper user !");
		}
		else{
		$.ajax({
				type:"GET",
				url:"load.php",
				cache:false,
				data: {
					"receiver":receiver
				},

				beforeSend:function(){
					//alert(comp);
					console.log("Data sent");


				},
				dataType:"html",
				success:function(html)
				{
					//alert(data);
					
					$("#load").empty().append(html);
				}
			});
	}

}
/*function loadagain(){
	setInterval(loadmsg, 3000);
}
*/
</script>
       </body> 
        
    

</html>