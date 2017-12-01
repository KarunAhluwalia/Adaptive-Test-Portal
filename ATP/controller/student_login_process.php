<?php
include('connection.php');
session_start();
?>

<?php
//searching a row

if(!empty($_POST['email']) && !empty($_POST['password'])){

	$email = $_POST['email'];
	$password = $_POST['password'];
		
	//define the query
	$query = "SELECT * FROM Student WHERE email='$email' and password='$password'";
	$result = pg_query($connection, $query);
		
	if(!$result){
		header("Location: login.php?error=Select%20Error!");
	} else {	
		if($rows = pg_num_rows($result) > 0){
			
			while($row = pg_fetch_row($result)) {
				if($row[5] != $password) {
					header("Location: login.php?error=Invalid%20Password!");
				};
				$_SESSION['first_name'] = $row[1];
				$_SESSION['last_name'] = $row[2];
				$_SESSION['email'] = $row[3];
				$_SESSION['tel_number'] = $row[4];
		
				header("Location: profile.php?success=Profile%20Page");
			
			}
		}
	}
} else {
	
	//they left a box empty
	header("Location: login.php?error=Fields%20required!");

};
?>