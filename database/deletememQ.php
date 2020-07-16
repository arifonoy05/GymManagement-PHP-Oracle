<?php
$sql1 = "delete from posts where u_id={$uid};";
$sql = "delete from users where u_id={$uid};";
		
mysqli_query($conn, $sql1);

		mysqli_query($conn, $sql);

?>