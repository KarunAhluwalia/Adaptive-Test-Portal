3<?php
include('connection.php');
session_start();
?>

<?php

if(!empty($_POST['company_name']) && !empty($_POST['admin_email_id']) && !empty($_POST['password']) && !empty($_POST['confirm'])){
	if ($_POST['password'] === $_POST['confirm']) {
		$company_name = $_POST['company_name'];
		$admin_email_id = $_POST['admin_email_id'];
		$password = $_POST['password'];

		//define the query
		$query = "INSERT INTO Company(company_name,admin_email_id,password) VALUES('$company_name', '$admin_email_id', '$password' )";
		$result = pg_query($connection, $query);
	
		//If there was some sort of query execution problem
		if(!$result){
			header("Location: company_signup_process.php?error=Insert%20Error!");
		}	
		//insert was successful
		else{
				$_SESSION['company_name'] = $company_name;
				$_SESSION['admin_email_id'] = $admin_email_id;
		
				header("Location: company_profile.php?success=Profile%20Page");
		}
	}
	else{
		header("Location: company_signup_process.php?error=Passwords%20Does%20Not%20Match");
	}
	

}
else{
	
	//they left a box empty
	
	header("Location: company_signup_process.php?error=Fields%20required!");
}
?>