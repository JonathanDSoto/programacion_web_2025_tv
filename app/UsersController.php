<?php

include "UserModel.php";

	if (isset($_POST['action']) && $_POST['action'] == "create_user") {

	 	$name = $_POST['name'];
	 	$lastname = ( (isset($_POST['lastname'])?$_POST['lastname']:"") );
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

		if ($this->User->create($name,$lastname,$email,$password)) {
			
			header('Location: ../users.php?status=ok');

		}else

			header('Location: ../users.php?status=error');

	}

}


?>