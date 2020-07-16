<?php

if (isset($_REQUEST['submit'])) {

    $file   = $_FILES['image'];

    $sql = "select * from posts where u_id = '{$uid}'";
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
            $fileNameNew = 'post'.$row['p_id'].'.'.$fileActExt;
            $fileDest = "../img/".$fileNameNew;

            move_uploaded_file($fileTempName,$fileDest);
            $sql = "select * from posts where"

            $sql = "update posts set imgname='{$fileNameNew}' where p_id = '{$email}';";
            mysqli_query($con, $sql);

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
?>