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
        <?php
            include_once '../control/header.php';
            $con = getConnection();
            $sql = "select * from users";
            $result = mysqli_query($con,$sql);
            while($row = mysqli_fetch_assoc($result)){
                if($row['email'] == $_SESSION['email']){
                    $uid = $row['u_id'];
                }
            }
        ?>
        <div class="container log-reg">
            <div class="addpost">
                <form action="../control/addpostchk.php" method="post" enctype="multipart/form-data">
                    <table style="margin-left: -300px">
                        <td><input type="text" name="id" value="<?=$uid?>" hidden></td>
                        <tr>
                            <td>Title</td>
                            <td><input style="width: 380px;" type="text" name="title" required></td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td><textarea style="resize: none; height: 135px; width: 380px;" name="description" cols="30" rows="10" required></textarea></td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td><input style="width: 380px;" type="number" name="price" required></td>
                        </tr>
                        <tr>
                            <td>Upload Image</td>
                            <td><input type="file" name="image" id="image"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input name="submit" type="submit" value="Post"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
</body>
</html>
<?php }else{
	header("location: login.php");
} ?>