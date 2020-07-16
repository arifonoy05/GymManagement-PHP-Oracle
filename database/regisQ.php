<?php

	$sql = "insert into users(uname, email, password) values('$name','$email','$pass')";
	$query = mysqli_query($con,$sql);

?>