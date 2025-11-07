<?php

include "UserModel.php";

	if ($action == "create_user") {

	 	$name = $_POST['name'];
	 	$lastname = $_POST['lastname'];
	 	$email = $_POST['email'];
		$password = $_POST['password'];	

		$user = new UsersController();
		$user->create($name,$lastname,$email,$password);
	} 

class UsersController{

	private $User;

	public function __construct() {
	    $this->User = new UserModel();
	}

	public function getAll()
	{

		return $this->User->get();

	}

	public function create($name,$lastname,$email,$password)
	{ 
		return $this->User->create($name,$lastname,$email,$password);

	}

}


?>