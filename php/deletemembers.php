<?php
session_start();

include('../database/db.php');

$uid = "";
	if(isset($_GET['id'])){
		$uid= $_GET['id'];
$conn = getConnection();		
include('../database/deletememQ.php');
		header("location:../views/allus.php");
		

	}

?> 