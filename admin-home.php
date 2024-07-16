<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login</title>
        <link rel="stylesheet" href="style1.css">
    </head>
    <body>
        <div id="full">
            <div id="inner-full">
                <div id="header"><h2><a href="admin-home.php" style="text-decoration: none;color:azure;">Blood Bank Management System</h2></div>
                <div id="body">
                    <br>
                    <?php
                    $un=$_SESSION['un'];
                    if(!$un)
                    {
                        header("Location:index.php");
                    }
                    ?>
            <h1> WELLCOME ADMIN </h1><br><br>
            <ul>
                <li><a href="donor-reg.php">Donor Registration</a></li>
                <li><a href="donor-list.php">Donor List</a></li>
                <li><a href="stoke-blood-list.php">Stoke Blood List</a></li>
            </ul><br><br><br><br><br>
            <ul>
            <li><a href="out-stoke-blood-list.php">Out Stoke Blood list</a></li>
            <li><a href="exchange-blood-list.php">Exchange Blood Registration</a></li>
            <li><a href="exchange-blood-list1.php">Exchange Blood list</a></li>
            </ul>
                </div>
                <div id="footer"><h4 align= "center"><font color=#fdfcfc">rakeshgk123@project</font></h4>
            <p align="center"><a href="logout.php"><font color=blue">Logout</font></a></p>
            </div>
            </div>
        </div>
    </body>
</html>