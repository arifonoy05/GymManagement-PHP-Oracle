<!DOCTYPE html>
<html>
<head>
	<title>login </title>
	        <!-- css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/alphaq.css">
</head>
<body>
	<section class="log-reg">
		<h1>Login Page</h1>
		<form method="post" action="../control/logincheck.php">
				<table>
					<tr>
						<td>Email </td>
						<td><input type="text" name="email"></td>
					</tr>
					<tr>
						<td>Password </td>
						<td><input type="password" name="pass"></td>
					</tr>
					<tr>
						<td></td>
						<td><a href="register.php">Sign Up</a><input type="submit" name="submit" value="Submit"></td>
					</tr>
				</table>
		</form>
	</section>
</body>
</html>