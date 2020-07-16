<?php
session_start();

include('../database/db.php');

$uid = "";
	if(isset($_GET['id'])){
		$uid= $_GET['id'];
$conn = getConnection();		
$sql = "delete from posts where p_id={$uid};";
mysqli_query($conn, $sql);
		header("location:../views/allpo.php");
		

	}

?> 