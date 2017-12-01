<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php

	echo "Name: ".$_SESSION['first_name']." ".$_SESSION['last_name']."<br>Email: ".$_SESSION['email']."<br>State: ".$_SESSION['tel_number']."<br>";
	
?>
</body>
</html>