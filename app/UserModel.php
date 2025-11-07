<?php

include "connectionController.php";

class UserModel{

	private $connection;

	public function __construct() {
	    $this->connection = new ConnectionController();
	}

	public function get()
	{
		$query = "select * from users"; 
		$prepared_query = $conn->prepare($query); 
		$prepared_query->execute();

		$results = $prepared_query->get_result();
		$users = $results->fetch_all(MYSQLI_ASSOC);

		return $users;
	}

	public function create($name,$lastname,$email,$password)
	{
 
		$query = "INSERT INTO users (name, lastname, email, password) VALUES (?,?,?,?)";

		$prepared_query = $conn->prepare($query);

		$prepared_query->bind_param('ssss', $name,$lastname,$email,$password);

		$prepared_query->execute();

		$results = $prepared_query->get_result();

		if ($results->errno){
			return false;
		}else
			return true;
	}

	public function update($name,$lastname,$email,$password,$id)
	{ 
	
		$query = "update users SET name= ?,lastname= ? ,email= ? ,password= ?  WHERE id = ?";

		$prepared_query = $conn->prepare($query);

		$prepared_query->bind_param('ssssi', $name,$lastname,$email,$password,$id);

		$prepared_query->execute();

		$results = $prepared_query->get_result();

		if ($results->errno){
			return false;
		}else
			return true;
	}

	public function delete($id)
	{
		$query = "delete FROM `users` WHERE id = ?";

		$prepared_query = $conn->prepare($query);

		$prepared_query->bind_param('i',$id);

		$prepared_query->execute();

		$results = $prepared_query->get_result();

		if ($results->errno){
			return false;
		}else
			return true;
	}
}


?>