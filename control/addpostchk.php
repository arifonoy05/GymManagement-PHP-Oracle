<?php
    include_once('../model/db.php');
    session_start();

    if(isset($_REQUEST['submit'])){
        $uid            = trim($_REQUEST['id']);
        $title          = trim($_REQUEST['title']);
        $description    = trim($_REQUEST['description']);
        $price          = trim($_REQUEST['price']);
        $file           = $_FILES['image'];

        $con = getConnection();
        $sql = "insert into posts (title, description, u_id, status, price) values ('{$title}', '{$description}', {$uid}, 0, {$price})";

        $result = mysqli_query($con, $sql);

        if ($result) {
            $sqlSub = "select p_id from posts where u_id = '{$uid}' and title = '{$title}' and description = '{$description}' and price = {$price}";
            $result = mysqli_query($con, $sqlSub);
            $row = mysqli_fetch_assoc($result);
            print_r($row);

            $fileName = $file['name'];
            $fileTempName = $file['tmp_name'];
            $fileSize = $file['size'];

            $fileExt = explode('.',$fileName);
            $fileActExt = strtolower(end($fileExt));

            $allowed = array('jpg','jpeg','png');

            if(in_array($fileActExt, $allowed)){
                if($fileSize < 1000000000){
                    $fileNameNew = 'post'.$row['p_id'].'.'.$fileActExt;
                    $fileDest = "../img/".$fileNameNew;

                    move_uploaded_file($fileTempName,$fileDest);
                    $sql = "update posts set imgname='{$fileNameNew}' where p_id = '{$row['p_id']}';";
                    mysqli_query($con, $sql);

                    header('location: ../views/post-page.php');
                    
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
    // }
?>