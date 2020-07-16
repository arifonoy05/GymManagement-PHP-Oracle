<?php
	session_start();
	include_once('../model/db.php');
	if(isset($_SESSION['email'])){ 
        $sql = "select u_id from users where email = '{$_SESSION['email']}'";
        $con = getConnection();
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        $uid = $row['u_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to AlphaQ</title>

        <!-- css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/alphaq.css">
</head>
<body>
    <?php include_once '../control/header.php'; ?>
    <section class="requests-section">
        <div class="container">
            <div class="row">
                <div class="col-10"></div>
                <div class="col-2">
                    <a href="addpost.php">New Post</a>
                </div>
            </div>
        <?php
            $sql = "select * from posts";
            $con = getConnection();
            $result = mysqli_query($con, $sql);
            while($row = mysqli_fetch_assoc($result)){
                if($row['u_id'] == $uid && $row['status'] != 3){
                ?>
            <div class="row">
                <div class="col-md-7 left">
                    <h3><?php echo $row['title'];?></h3>
                    <p><?=$row['description']?></p>
                    <p>Price: <?=$row['price']?></p>
                    <a href="editpost.php?pid=<?=$row['p_id']?>">Edit</a>
                </div>
                <div class="col-md-4 right">
                    <img src="../img/<?=$row['imgname']?>" alt="">
                </div>
            </div>
                <?php
                }
            }
        ?>
</body>
</html>
<?php }else{
	header("location: login.php");
} ?>