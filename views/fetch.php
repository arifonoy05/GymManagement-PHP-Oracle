<?php  

session_start();

include('../database/db.php');



  $s = $_GET['usearch'];
$conn = getConnection();
  $sql = "select * from users where status = 1 and uname like '%$s%'";
  $result = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($result);
        if($count > 0){
while($row = mysqli_fetch_assoc($result)){

          
          echo"  
     <table border = '1'>
        <tr>
          <td>ID</td>
          
          <td>USERNAME</td>
          <td>EMAIL</td>
          <td>PASSWORD</td>
          <td>status</td>
          <td>TYPE</td>
          <td>balance</td>
        </tr>
        <tr>
                <td>".$row['u_id']."</td>
                <td>".$row['uname']."</td>
                <td>".$row['email']."</td>
                <td>".$row['password']."</td>
                <td>".$row['status']."</td>
                <td>".$row['type']."</td>
                <td>".$row['balance']."</td>
                <td> 
                
                
                
              </tr>

              </table>";
            }}else{

              echo 'no members with this name';
            }

?>