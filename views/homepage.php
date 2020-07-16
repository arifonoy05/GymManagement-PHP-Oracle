<?php
session_start();
if(isset($_SESSION['email'])){
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Home | Moderator</title>
	<link rel="stylesheet" href="../css/color1.css">
</head>
<body>
	<body background="../images/white.jpg">
	<h2>Welcome</h2>
<br>
	<?php
$name = $_SESSION['email'];
echo $name;
	?>
	<br>

<a href="nmember.php"><h3>New Members requests</h3></a>

<a href="nposts.php"><h3>New posts requests</h3></a>

<a href="comp.php"><h3>Complains</h3></a>

<a href="allus.php"><h3>All users</h3></a>

<a href="allpo.php"><h3>All posts</h3></a>

<a href="profile.php"><h3>Profile</h3></a>

<a href="../php/Logout.php"><h3>Logout</h3></a>

</body>
</html>



<?php

}
else{
header('location:Login.php');

}
?>
