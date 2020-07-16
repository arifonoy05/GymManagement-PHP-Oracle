<?php

	$server = "localhost";
	$user = "root";
	$password = "";
	$database = "mydata";


	function getConnection(){
		global $server, $user, $password, $database;
	
		$conn = mysqli_connect($server, $user, $password, $database);
		return $conn;
	}

?>