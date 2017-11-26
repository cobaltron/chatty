<?php

include('config.php');
$con=new mysqli($host, $user, $password, $db);
 if($con->connect_errno)
 {
 	die('Connect Error:' .$con->connect_errno);
 }

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<script src="Source/bootstrap-login-register-forms/form-2/assets/js/jquery-1.11.1.min.js"></script>
        <script src="Source/bootstrap-login-register-forms/form-2/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="Source/bootstrap-login-register-forms/form-2/assets/js/jquery.backstretch.min.js"></script>
        <script src="Source/bootstrap-login-register-forms/form-2/assets/js/scripts.js"></script>
        
</body>
</html>