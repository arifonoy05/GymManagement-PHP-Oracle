<?php
    include_once('../model/db.php');
    include_once('../model/dpcheckemail.php');
    if(isset($_REQUEST['update'])){
        $uname = $_REQUEST['uname'];
        $pass = $_REQUEST['pass'];
        $email = $_REQUEST['email'];
        $uid = $_REQUEST['id'];
        // if(checkUniqueEmail($email) || ){
            $sql = "update users set uname = '{$uname}', password = '{$pass}', email = '{$email}' where u_id = {$uid}";
            $con = getConnection();

            $result = mysqli_query($con, $sql);
            
            if($result){
                $sql = "select * from users where u_id = {$uid}";
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($result);
                $_SESSION['email'] = $row['email'];
                
                header('location: ../views/profile.php');
            }

        // }
        // else{
        //     echo "email address already exists";
        // }
        
    }
?>