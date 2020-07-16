<?php
	session_start();
	include_once('../model/db.php');
	if(isset($_SESSION['email'])){ 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Contact</title>
    <!-- css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/alphaq.css">
</head>
<body>
    <?php
    include '../control/header.php';
    ?>
    <!-- Profile Section -->
    <section class="edit-contact">
        <div class="container">
            <form method="post" action="">
                <table>
                    <tr>
                        <th>Current contact</th>
                        <td><input type="text" placeholder=" Current contact"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>New contact</th>
                        <td><input type="text" placeholder=" New contact"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td><input id="#sub-btn" type="submit" name="submit" value="Confirm"></td>
                        <td></td>
                    </tr>
                </table>
            </form>
        </div>
    </section>
    <!-- Profile Section -->
</body>
</html>
<?php

}
else{
header('location:Login.php');

}
?>