<?php
session_start();

include('../database/db.php');

if(isset($_REQUEST['submit']))
{


$name = trim($_REQUEST['uname']);
$pass = trim($_REQUEST['pass']);
$email = trim($_REQUEST['email']);




$con = getConnection();

if($con)

include('../database/regisQ.php');

if($query)

    echo "<br>";
    echo 'data inserted';
    // header('location:../views/Login.php');
    


}
else {

    header('loaction../views/Login.php');
}

?>