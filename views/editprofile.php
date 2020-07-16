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
            $sql = "select * from users where email = '{$_SESSION['email']}'";
            $con = getConnection();
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
            
        ?>
        <div class="container">
            <div class="row">
                <div class="container log-reg">
                    <div class="addpost">
                    <form name="editProfile" method="post" action="../control/editprofilechk.php" enctype="multipart/form-data">
                        <table>
                        <tr>
                            <td>Username </td>
                            <td><input type="text" name="uname" id="uname" value="<?=$row['uname']?>"></td>
                        </tr>
                        <tr>
                            <td>Password </td>
                            <td><input type="password" name="pass" id="pass" value="<?=$row['password']?>"></td>
                        </tr>
                        <tr>
                            <td>Email </td>
                            <td><input type="email" name="email" id="email" value="<?=$row['email']?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input name="update" id="update" value="Update" type="submit"></td>
                        </tr>
                        </table>
                        <input type="text" name="id" value="<?=$row['u_id']?>" hidden>
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