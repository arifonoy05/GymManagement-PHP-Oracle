<?php


session_start();

include('../database/db.php');



	if(isset($_POST['update'])){
		
		$uname 		= $_POST['use'];
		$pass 		= $_POST['pass'];
		$email 		= $_POST['ema'];
		$id 		= $_POST['id'];

		if(!empty($uname) && !empty($pass) && !empty($email)){
			$conn = getConnection();
			include('../database/editcheckQ.php');

			

			if(mysqli_query($conn, $sql)){
				$_SESSION['email'] = $email;
				header("location: ../views/profile.php");
			}else{
				header("location: ../views/edit.php?error=sql_error");
			}

		}else{
			header("location: ../views/edit.php?error=null_found");
		}
	}else{
		header("location: ../views/edit.php?error=invalid_request");
	}
?>