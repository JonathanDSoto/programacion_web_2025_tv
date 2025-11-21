<?php 
	session_start();

	if (!isset($_SESSION['token'])) { 
		$_SESSION['token'] =  md5(uniqid(mt_rand(), true));
	}

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL); 

	include "connectionController.php";

	$action = $_POST['action'];
	$ftoken = $_POST['ftoken'];	



	if ($action == "login" && $ftoken == $_SESSION['token']) {

	 	$username = $_POST['username'];
		$password = $_POST['password']; 

		$auth = new AuthController();
		$auth->login($username,$password);
	}  

class AuthController{ 

	private $connection;

	public function __construct() {
	    $this->connection = new ConnectionController();
	}

	function login($username,$password)
	{

		$username = STRIP_TAGS($username);
		$username = HTMLESPECIALCHARTS($username);
		$username = HTMLENTITIES($username);

		$password = STRIP_TAGS($password);
		$password = HTMLESPECIALCHARTS($password);
		$password = HTMLENTITIES($password); 

		$conn = $this->connection->connect();
		if (!$conn->connect_error) {
			
			$query = "select * from users where email = ? and password = ?";

			$prepared_query = $conn->prepare($query);

			$prepared_query->bind_param('ss', $username, $password);

			$prepared_query->execute();

			$results = $prepared_query->get_result();
			$users = $results->fetch_all(MYSQLI_ASSOC);

			if (count($users)>0) {

				$_SESSION['email'] = $users['email'];
				$_SESSION['name'] = $users['name'];
				
				header('Location: ../home.php');

			}else
				header('Location: ../login.php');
			
		}else
			header('Location: ../login.php');
	} 

}

?>