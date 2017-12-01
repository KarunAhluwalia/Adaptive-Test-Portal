<?php
include('connection.php');
session_start();
?>

<?php

if(!empty($_POST['first_name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm'])){
	if ($_POST['password'] === $_POST['confirm']) {
		$first_name = $_POST['first_name'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(!empty($_POST['last_name'])){
			$last_name = $_POST['last_name'];
		}else{
			$last_name = 'NULL';
		}
		
		if(!empty($_POST['tel_number'])){
			$tel_number = "'".$_POST['tel_number']."'";
		}else{
			$tel_number = 'NULL';
		}
		//define the query
		$query = "INSERT INTO Student(first_name,last_name,email,tel_number,password) VALUES('$first_name', '$last_name', '$email', '$tel_number', 					'$password' )";
		$result = pg_query($connection, $query);
	
		//If there was some sort of query execution problem
		if(!$result){
			header("Location: student_signup_process.php?error=Insert%20Error!");
		}	
		//insert was successful
		else{
				$_SESSION['first_name'] = $first_name;
				$_SESSION['last_name'] = $last_name;
				$_SESSION['email'] = $email;
				$_SESSION['tel_number'] = $tel_number;
		
				header("Location: student_profile.php?success=Profile%20Page");
		}
	}
	else{
		header("Location: student_signup_process.php?error=Passwords%20Does%20Not%20Match");
	}
	

}
else{
	
	//they left a box empty
	
	header("Location: student_signp_process.php?error=Fields%20required!");
}
?>