<?php
	session_start();
	if(isset($_SESSION['name'])){
        header("location: views/home.php");
    }
    else{
        header("location: views/login.php");
    }
?>