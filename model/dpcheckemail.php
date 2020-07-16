<?php
    include_once('db.php');

    $con = getConnection();

    function checkUniqueEmail($mail){
        global $row, $result, $con;
        $sql = "select email from users where email ='{$mail}' ";
        $result = mysqli_query($con, $sql);

        $count = mysqli_num_rows($result);

        if($count > 0){
            return false;
        }
        else{
            return true;
        }

    }


?>