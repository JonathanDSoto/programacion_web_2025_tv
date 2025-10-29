<?php 


	$username = $_POST['username'];
	$password = $_POST['password'];


	if ($username == "jonathansoto") {
		
		if ($password == "123123123") { 
			
			header('Location: ../home.html');
		}
	}else
		header('Location: ../login.html');

?>