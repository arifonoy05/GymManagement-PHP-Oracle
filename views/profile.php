<?php
	session_start();
	include_once('../model/db.php');
	if(isset($_SESSION['email'])){ 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <!-- css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/alphaq.css">
</head>
<body>
    <?php
    include '../control/header.php';
    $con = getConnection();
    $sql = "select * from users";
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result)){
        if($row['email'] == $_SESSION['email']){
            $uid = $row['u_id'];
    ?>
    <!-- Profile Section -->
    <section class="profile-section">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <table>
                        <tr>
                            <th>Name:</th>
                            <td><?=$row['uname']?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td><?=$row['email']?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Type:</th>
                            <td><?=$row['type']?></td>
                        </tr>
                        <tr>
                            <th>Balance:</th>
                            <td><?=$row['balance']?></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td><a href="editprofile.php">Edit Profile</a></td>
                        </tr>
                    </table>
                </div>
                <div class="col-4">
                    <div class="profile-picture">
                        <img src="../img/<?=$row['imgname']?>" alt="" style="width: 440px;margin-top:100px;">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Profile Section -->
</body>
</html>
<?php
        }
    }
}
else{
header('location:Login.php');

}
?>