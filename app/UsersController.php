<?php
session_start();

if (!isset($_SESSION['token'])) { 
	$_SESSION['token'] =  md5(uniqid(mt_rand(), true));
}
include "UserModel.php";
include 'ToolsController.php';

	$action = (isset($_POST['action']))?$_POST['action']:'';
	$ftoken = (isset($_POST['ftoken']))?$_POST['ftoken']:'';

	if ($ftoken == $_SESSION['token']) { 

		switch ($action) {
			case 'create_user':
					
				$name = $_POST['name'];
			 	$lastname = ( (isset($_POST['lastname'])?$_POST['lastname']:"") );
			 	$email = $_POST['email'];
				$password = $_POST['password'];	

				$user = new UsersController();
				$user->create($name,$lastname,$email,$password);

			break;

			case 'update_users':
					
				$name = $_POST['name'];
			 	$lastname = ( (isset($_POST['lastname'])?$_POST['lastname']:"") );
			 	$email = $_POST['email'];
				$user_id = $_POST['user_id'];	

				$user = new UsersController();
				$user->update($name,$lastname,$email,$user_id);

			break;

			case 'remove_users':
					
				$user_id = $_POST['user_id']; 	

				$user = new UsersController();
				//$user->create($name,$lastname,$email,$password);

			break;
			
			default: 
				break;
		}  
	 
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

	    $name     = ToolsController::clean($name);
	    $lastname = ToolsController::clean($lastname);
	    $email    = ToolsController::clean($email);
	    $password = ToolsController::clean($password);

	    if(!ToolsController::validate($name, 'alpha') ||
	        !ToolsController::validate($lastname, 'alpha') ||
	        !ToolsController::validate($email, 'email') ||
	        !ToolsController::validate($password, 'string')){
	       
	        header('Location: ../users.php?status=invalid');
	
	    }


		if ($this->User->create($name,$lastname,$email,$password)) {
			
			header('Location: ../users.php?status=ok');

		}else

			header('Location: ../users.php?status=error');

	}

	public function update($name,$lastname,$email,$user_id)
	{ 

	    $name     = ToolsController::clean($name);
	    $lastname = ToolsController::clean($lastname);
	    $email    = ToolsController::clean($email); 

	    if(!ToolsController::validate($name, 'alpha') ||
	        !ToolsController::validate($lastname, 'alpha') ||
	        !ToolsController::validate($email, 'email') ){
	       
	        header('Location: ../users.php?status=invalid');
	
	    }


		if ($this->User->update($name,$lastname,$email,$user_id)) {
			
			header('Location: ../users.php?status=ok');

		}else

			header('Location: ../users.php?status=error');

	}

	public function remove($user_id)
	{ 
 

		if ($this->User->delete($user_id)) {
			
			header('Location: ../users.php?status=ok');

		}else

			header('Location: ../users.php?status=error');

	}

}


?>