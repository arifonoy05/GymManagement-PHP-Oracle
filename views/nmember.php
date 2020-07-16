<?php
session_start();
 include('../database/db.php');

?>
<!DOCTYPE html>
<html>
<head>
  <title>New members</title>
  <link rel="stylesheet" href="../css/color1.css">
</head>
<body>
<body background="../images/white.jpg">
  <h3>New members:</h3>
 <a href="homepage.php"><h3>Back</h3></a>
  <br>

      <?php
        $conn = getConnection();
        $sql = "select * from users where status = 0";
        $result = mysqli_query($conn, $sql);
      
        $count = mysqli_num_rows($result);
        if($count > 0){
          echo '<form>
     <table border="1">
        <tr>
          <td>ID</td>
          
          <td>USERNAME</td>
          <td>EMAIL</td>
          <td>PASSWORD</td>
          <td>status</td>
          <td>TYPE</td>
          <td>balance</td>
          
        </tr>';
        $sql = "select * from users";
        $re = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($re)){
          if($row['status'] == 0){
          echo "  <tr>
                <td>".$row['u_id']."</td>
                <td>".$row['uname']."</td>
                <td>".$row['email']."</td>
                <td>".$row['password']."</td>
                <td>".$row['status']."</td>
                <td>".$row['type']."</td>
                <td>".$row['balance']."</td>
                <td> 
                  <a href='../php/verifycheck.php?id=".$row['u_id']."'>Verify</a>
                  <a href='../php/deletenewmem.php?id=".$row['u_id']."'>Delete</a>
                </td>
                </tr>";
            }
            
        }

        }
        else{

              echo "NO new users";
            }
      ?>
      </table>
</form>


</body>
</html>