<?php
include('connection.php');

session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP+MySQL Practice: Login</title>
</head>
<body>

<?php
// Show meaningful message if there were issues
if (isset($_GET['error'])) {
	echo $_GET['error']."<br><hr>";
};
?>

<form method="POST" action="student_login_process.php">
	<label>Username </label>
	<input type="text" name="email">
	<br>
	<label>Password: </label>
	<input type="text" name="password">
	<br>
	<input type="submit" name="submit">
</body>
</html>