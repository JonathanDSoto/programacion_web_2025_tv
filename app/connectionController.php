<?php 

class ConnectionController{

	private $HOST = "localhost";
	private $USER = "root";
	private $PASS = "";
	private $DBNM = "programacion_web_tv";

	function connect()
	{
		$conn = new mysqli($this->HOST,$this->USER,$this->PASS,$this->DBNM);
		if ($conn) {
			return $conn;
		}
		return null;
	}

}

?>