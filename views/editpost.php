<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Post</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/alphaq.css">
</head>
<body>
    <?php
        include_once('../model/db.php');
        session_start();
        include_once('../control/header.php');

        if(isset($_SESSION['email'])){
            $pid = $_GET['pid'];
            $sql = "select * from posts where p_id = {$pid}";
            $con = getConnection();
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
            
        ?>
        <div class="container">
            <div class="row">
                <div class="container log-reg">
                    <div class="addpost">
                        <form action="../control/editpostchk.php" method="post">
                            <table style="margin-left: -300px">
                                <td><input type="text" name="id" value="<?=$pid?>" hidden></td>
                                <tr>
                                    <td>Title</td>
                                    <td><input style="width: 380px;" type="text" name="title" value="<?=$row['title']?>" required></td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td><textarea style="resize: none; height: 135px; width: 380px;" name="description" cols="30" rows="10" required></textarea></td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td><input style="width: 380px;" type="number" name="price" value="<?=$row['price']?>" required></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input name="submit" type="submit" value="Update"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
            }
            else{
                header('location: login.php');
            }
        ?>
    </body>
</html>