<?php
    session_start();
    include('../database/db.php');

    if(isset($_REQUEST['submit']))
    {

        $ema = trim($_REQUEST['emai']);
        $pass = trim($_REQUEST['pass']);
        
        if($ema == ""){
            echo "invalid or empty email..<br>";
        }else if($pass == ""){
            echo "invalid or empty password..";
        }else{
            
            $conn = getConnection();
            $sql = "select * from users where email='".$ema."' and password='".$pass."'";
            $result = mysqli_query($conn, $sql);
           
            
            $count = mysqli_num_rows($result);
            mysqli_close($conn);
    
            if($count > 0 ){

                $_SESSION['email'] = $ema;
                header('location:../views/homepage.php');
            }else{
                echo "invalid username/password.";
            }
        }

    }else{
        header('location:../views/Login.php');
        //echo "Invalid request!";
    }
?>
