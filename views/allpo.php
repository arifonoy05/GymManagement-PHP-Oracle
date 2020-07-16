<?php
session_start();
 include('../database/db.php');

?>
<!DOCTYPE html>
<html>
<head>
  <title>All Posts</title>
  <link rel="stylesheet" href="../css/color1.css">
</head>
<body>
<body background="../images/white.jpg">
  <a href="homepage.php"><h3>Back</h3></a>
  <br>
  <h3>All Posts:</h3>
<?php
        $conn = getConnection();
        $sql = "select * from posts where status = 1";
        $result = mysqli_query($conn, $sql);
      
        $count = mysqli_num_rows($result);


        if($count > 0){
          
        $sql = "select * from posts where status = 1";
        $re = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($re)){

          
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
          echo "  <tr>
               <td>".$row['p_id']."</td>
                <td>".$row['title']."</td>
                <td>".$row['description']."</td>
                <td>".$row['u_id']."</td>
                <td>".$row['status']."</td>
                <td>".$row['price']."</td>
                
                <td> 
                  
                  <a href='../php/deleteposts.php?id=".$row['p_id']."'>Delete</a>
                </td>
                
                
              </tr>";
        }
      }
        else{

              echo "NO posts";
            }
      ?>
      </table>
</form>
</form>
</body>
</html>