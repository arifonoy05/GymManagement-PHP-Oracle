<?php
    session_start();
    include_once('../model/db.php');

    if(isset($_REQUEST['submit']))
    {

        $email = trim($_REQUEST['email']);
        $pass = trim($_REQUEST['pass']);
        
        if($email == ""){
            echo "invalid or empty email..<br>";
        }else if($pass == ""){
            echo "invalid or empty password..";
        }else{
            
            $conn = getConnection();
            $sql = "select * from users where email='".$email."' and password='".$pass."'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            
            $count = mysqli_num_rows($result);
            mysqli_close($conn);
    
            if($count > 0 ){

                $_SESSION['email'] = $email;
                // header('location: ../views/home.php');
                // echo "success";
                if($row['type'] == "seller"){
                    header('location: ../views/home.php');
                }
                else if($row['type'] == "buyer"){
                    header('location: ../views/homeB.php');
                }
                else if($row['type'] == "admin"){
                    header('location: ../views/homepage.php');
                }
            }
            else{
                echo "invalid username/password.";
            }
        }

    }else{
        header('location: ../views/login.php');
        //echo "Invalid request!";
    }
?>
