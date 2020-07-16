<?php
    session_start();
    //include_once('../model/dp.php');       //shows error
    include_once('../model/db.php');
    include_once('../model/dpcheckemail.php');

if (isset($_REQUEST['submit'])) {
    $name   = trim($_REQUEST['uname']);
    $pass   = trim($_REQUEST['pass']);
    $email  = trim($_REQUEST['email']);
    $type   = trim($_REQUEST['type']);

    $file   = $_FILES['image'];
    $con = getConnection();

    if ($name == "") {
        echo "empty name entered, try again";
    }
    else if( $pass == ""){
        echo "password is empty, try again";
    }
    else if( $email == ""){
        echo "empty email";
    }
    else if(checkUniqueEmail($email) == false){
        echo "email is not unique, try a different email";
    }
    else {
        $sql = "insert into users(uname, password, email, type)values('$name','$pass','$email', '$type')";

        $query = mysqli_query($con, $sql);

        if ($query) {
            $sql = "select * from users where email = '{$email}'";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);

            $fileName = $file['name'];
            $fileTempName = $file['tmp_name'];
            $fileSize = $file['size'];

            $fileExt = explode('.',$fileName);
            $fileActExt = strtolower(end($fileExt));

            $allowed = array('jpg','jpeg','png');

            if(in_array($fileActExt, $allowed)){
                if($fileSize < 1000000000){
                    $fileNameNew = 'profile'.$row['u_id'].'.'.$fileActExt;
                    $fileDest = "../img/".$fileNameNew;

                    move_uploaded_file($fileTempName,$fileDest);
                    $sql = "update users set imgname='{$fileNameNew}' where email = '{$email}';";
                    mysqli_query($con, $sql);

                    header('location: ../views/login.php');
                    
                }
                else{
                    echo "file not uploaded";
                }
            }
            else{
                echo "error";
            }
        }
        else{
            echo "query failed";
        }
    }
} else {

    header('location: ../views/register.php');
}
?>