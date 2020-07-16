<?php
session_start();

include('../database/db.php');

$uid = "";
	if(isset($_GET['id'])){
		$uid= $_GET['id'];
        $conn = getConnection();		
        include('../database/deletememQ.php');
        mysqli_query($conn, $sql);
		header("location:../views/nmember.php");
		
}
	

?> 