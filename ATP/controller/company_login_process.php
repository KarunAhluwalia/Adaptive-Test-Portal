<?php
include('connection.php');
session_start();
?>

<?php
//searching a row

if(!empty($_POST['admin_email_id']) && !empty($_POST['password'])){

	$admin_email_id = $_POST['admin_email_id'];
	$password = $_POST['password'];
		
	//define the query
	$query = "SELECT * FROM Company WHERE admin_email_id='$admin_email_id' and password='$password'";
	$result = pg_query($connection, $query);
		
	if(!$result){
		header("Location: login.php?error=Select%20Error!");
	} else {	
		if($rows = pg_num_rows($result) > 0){
			
			while($row = pg_fetch_row($result)) {
				if($row[3] != $password) {
					header("Location: login.php?error=Invalid%20Password!");
				};
				$_SESSION['company_name'] = $row[1];
				$_SESSION['admin_email_id'] = $row[2];
		
				header("Location: profile.php?success=Profile%20Page");
			
			}
		}
	}
} else {
	
	//they left a box empty
	header("Location: login.php?error=Fields%20required!");

};
?>