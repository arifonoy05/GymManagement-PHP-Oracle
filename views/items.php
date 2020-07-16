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
    <title>Welcome to AlphaQ</title>

        <!-- css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/alphaq.css">
</head>
<body>
    <header>
        <nav>
            <div class="row">
                <div class="container">
                    <div class="col-md-3 logo nav-item">
                        <img src="../img/logo.png" alt="">
                    </div>
                    <div class="col-md-9 nav-link nav-item">
                        <a href="homeB.php">home</a>
                        <a href="items.php">bought item</a>
                        <a href="profileB.php">profile</a>
                        <a href="../control/logout.php">logout</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <section class="requests-section">
        <div class="container">
            
        <?php
            $sql = "select * from users where email = '{$_SESSION['email']}'";
            $con = getConnection();
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
            $uid = $row['u_id'];

            $sql = "select * from posts where b_id = {$uid};";
            $result = mysqli_query($con, $sql);
            while($row = mysqli_fetch_assoc($result)){
                if($row['b_id'] == $uid){
                ?>
            <div class="row">
                <div class="col-md-7 left">
                    <h3><?php echo $row['title'];?></h3>
                    <p><?=$row['description']?></p>
                    <p>Price: <?=$row['price']?></p>
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