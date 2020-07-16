<?php
    session_start();

    if(isset($_SESSION['email'])){
        include_once('../model/db.php');
        $pid = $_GET['pid'];
        $con = getConnection();
        $sql1 = "select * from users where email = '{$_SESSION['email']}'";
        $sql2 = "select * from posts where p_id = {$pid}";

        $result1 = mysqli_query($con, $sql1);
        $result2 = mysqli_query($con, $sql2);

        $row1 = mysqli_fetch_assoc($result1);
        $buyerID = $row1['u_id'];
        $row2 = mysqli_fetch_assoc($result2);
        $sellerID = $row2['u_id'];

        if($row1['balance'] < $row2['price']){
            echo "insufficient fund available";
        }
        else{
            $newBal = $row1['balance'] - $row2['price'];
            $sql = "update users set balance = {$newBal} where email = '{$_SESSION['email']}'";
            mysqli_query($con, $sql);
            $sql = "update posts set status = 3 and b_id = '{$buyerID}'  where p_id = {$pid}";
            mysqli_query($con, $sql);

            $sql = "select * from users where u_id = '{$sellerID}'";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
            $sellerBal = $row['balance'] + $row2['price'];

            $sql = "update users set balance = {$sellerBal} where u_id = {$sellerID}";
            mysqli_query($con, $sql);

            header('location: ../views/items.php');
        }
        
    }
?>