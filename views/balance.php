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
    <title>Profile</title>
    <!-- css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/alphaq.css">
</head>
<body>
    <?php
    include '../control/header.php';
    ?>
    <!-- Balance Section -->
    <section class="balance-section">
        <div class="container">
            <form method="post" action="">
                <table>
                    <tr>
                        <th>Current Balance</th>
                        <td>: Tk 4950</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Total Spent</th>
                        <td>: Tk 2000</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Add Fund</a></th>
                        <td><input type="text" placeholder=" Add Fund"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="submit" value="Add"></td>
                    </tr>
                </table>
            </form>
        </div>
    </section>
    <!-- Balance Section -->
</body>
</html>
<?php

}
else{
header('location:Login.php');

}
?>