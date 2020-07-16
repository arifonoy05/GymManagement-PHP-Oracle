<?php
    include_once('../model/db.php');
    if(isset($_REQUEST['submit'])){
        $title = $_REQUEST['title'];
        $description = $_REQUEST['description'];
        $price = $_REQUEST['price'];
        $pid = $_REQUEST['id'];

        $sql = "update posts set title = '{$title}', description = '{$description}', price = {$price} where p_id = {$pid}";
        $con = getConnection();

        $result = mysqli_query($con, $sql);
        
        if($result){
            header('location: ../views/post-page.php');
        }

    }
?>