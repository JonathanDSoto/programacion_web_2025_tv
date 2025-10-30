<?php 
	#ini_set('display_errors', 1);
	#ini_set('display_startup_errors', 1);
	#error_reporting(E_ALL); 

	include "connectionController.php";

	$action = $_POST['action'];

	if ($action == "login") {

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

		$conn = $this->connection->connect();
		if (!$conn->connect_error) {
			
			$query = "select * from users where email = ? and password = ?";

			$prepared_query = $conn->prepare($query);

			$prepared_query->bind_param('ss', $username, $password);

			$prepared_query->execute();

			$results = $prepared_query->get_result();
			$users = $results->fetch_all(MYSQLI_ASSOC);

			if (count($users)>0) {
				
				header('Location: ../home.html');

			}else
				header('Location: ../login.html');
			
		}else
			header('Location: ../login.html');
	} 

}

?>