<!DOCTYPE html>
<html>
  <head>
      <title>Registration Page</title>
      <!-- css -->
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/alphaq.css">
  </head>
  <body>
    <section class="log-reg">
      <h1>Register</h1>
      <form name="register" method="post" action="../control/regischeck.php" enctype="multipart/form-data">
        <table>
          <tr>
            <td>Username </td>
            <td><input type="text" name="uname" id="uname"></td>
          </tr>
          <tr>
            <td>Password </td>
            <td><input type="password" name="pass" id="pass"></td>
          </tr>
          <tr>
            <td>Email </td>
            <td><input type="email" name="email" id="email"></td>
          </tr>
          <tr>
            <td>User Type </td>
            <td>
              <select name="type">
                <option value="buyer">Buyer</option>
                <option value="seller">Seller</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Upload Image</td>
            <td><input type="file" name="image" id="image"></td>
          </tr>
          <tr>
            <td></td>
            <td><a href="login.php">Login</a><input name="submit" id="register" value="Register" type="submit"></td>
          </tr>
        </table>
      </form>
    </section>
  </body>

</html>