<?php
session_start();
 include('../database/db.php');

?>
<!DOCTYPE html>
<html>
<head>
  <title>New Posts</title>
  <link rel="stylesheet" href="../css/color1.css">
</head>
<body>
<body background="../images/white.jpg">
  <h3>New Posts:</h3>
  <a href="homepage.php"><h3>Back</h3></a>
  <br>
<?php
        $conn = getConnection();
        $sql = "select * from posts where status = 0";
        $result = mysqli_query($conn, $sql);
      
        $count = mysqli_num_rows($result);
        if($count > 0){
          echo '<form>
     <table border="1">
        <tr>
          <td>ID</td>
          <td>Title</td>
          <td>Description</td>
          <td>User Id</td>
          <td>status</td>
          <td>Price</td>
          
        </tr>';
        $sql = "select * from posts";
        $re = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($re)){

             
          if($row['status'] == '0'){
          echo "  <tr>
                <td>".$row['p_id']."</td>
                <td>".$row['title']."</td>
                <td>".$row['description']."</td>
                <td>".$row['u_id']."</td>
                <td>".$row['status']."</td>
                <td>".$row['price']."</td>
                <td> 
                  <a href='../php/verifycheckp.php?id=".$row['p_id']."'>Verify</a>
                  <a href='../php/deletenewposts.php?id=".$row['p_id']."'>Delete</a>
                </td>
                </tr>";
            }
            
        }

        }
        else{

              echo "NO new post";
            }
      ?>
      </table>
</body>
</html>