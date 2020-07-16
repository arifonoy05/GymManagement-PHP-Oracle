<?php
session_start();

include('../database/db.php');

$uid = "";
	if(isset($_GET['id'])){
		$uid= $_GET['id'];
		$sql = "select * from users where email='".$uid."'";
		$conn = getConnection();
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);

	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>EDIT User</title>
</head>
<body>
<h2>EDIT User</h2>
<a href="profile.php">Back</a>

<form method="post" action="../php/editcheck.php">
	<fieldset>
		<legend>Edit Profile</legend>
	<table>
		<tr>
			<input type="hidden" name="id" value="<?php echo trim($uid); ?>">
			<td>Username:</td>
			<td><input type="text" name="use" value="<?= $row['uname']?>"></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type="email" name="ema" value="<?= $row['email']?>"></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="password" name="pass" value="<?= $row['password']?>"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="update" value="Update"></td>
		</tr>
	</table>		
	</fieldset>
</form>

</body>
</html>



