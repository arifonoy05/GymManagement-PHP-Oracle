<?php
session_start();
 include('../database/db.php');

?>
<!DOCTYPE html>
<html>
<head>
  <title>All members</title>
  <link rel="stylesheet" href="../css/color1.css">
</head>
<body>
<body background="../images/white.jpg">
  <a href="homepage.php"><h3>Back</h3></a>
  <br>
  <h3>All verified members:</h3>
  

<a href="search.php"><h3>Search</h3></a>

 

      <?php
        $conn = getConnection();
        $sql = "select * from users where status = 1";
        $result = mysqli_query($conn, $sql);
      
        $count = mysqli_num_rows($result);


        if($count > 0){
          
        $sql = "select * from users where status = 1";
        $re = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($re)){

          if($row['type'] == 'seller'){
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
          echo "  <tr>
               <td>".$row['u_id']."</td>
                <td>".$row['uname']."</td>
                <td>".$row['email']."</td>
                <td>".$row['password']."</td>
                
                <td>".$row['status']."</td>
                <td>".$row['type']."</td>
                <td>".$row['balance']."</td>
                <td> 
                  
                  <a href='../php/deletemembers.php?id=".$row['u_id']."'>Delete</a>
                </td>
                
                
              </tr>";
            }else
            {
if($row['type'] == 'buyer'){
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
              echo "  <tr>
                <td>".$row['u_id']."</td>
                <td>".$row['uname']."</td>
                <td>".$row['email']."</td>
                <td>".$row['password']."</td>
                
                <td>".$row['status']."</td>
                <td>".$row['type']."</td>
                <td>".$row['balance']."</td>
                <td> 
                  <a href='../php/deletemembers.php?id=".$row['u_id']."'>Delete</a>
                </td>
                
                
              </tr>";
            }}
            
        }

        }
        else{

              echo "NO users";
            }
      ?>
      </table>
</form>
</body>
</html>