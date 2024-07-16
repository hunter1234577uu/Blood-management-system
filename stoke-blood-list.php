<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Donor Registration</title>
        <link rel="stylesheet" href="style1.css">
        <style type="text/css">
                td{
                    width: 200px;
                    height: 50px;
                    color: white;
                }
        </style>
    </head>
    <body>
        <div id="full">
            <div id="inner-full">
                <div id="header"><h2><a href="admin-home.php" style="text-decoration: none;color: white;">Blood Bank Management System</a></h2></div>
                <div id="body">
                    <br>
                    <?php
                    $un=$_SESSION['un'];
                    if(!$un)
                    {
                        header("Location:index.php");
                    }
                    ?>
            <h1>Stoke Blood List</h1>
            <center><div id="form">
                <table>
                    <tr>
                        <td><center><b><font color="blue">Name</font></b></center></td>
                        <td><center><b><font color="blue">Qty</font></b></center></td>
                    </tr>
                    <tr>
                        <td><center>O+</center></td>
                        <td><center>
                            <?php
                            $q=$db->query("SELECT * FROM donor_registration WHERE bgroup='O+'");
                            echo $row=$q->rowCount();
                            ?>
                        </center></td>
                    </tr>
                    <tr>
                        <td><center>AB+</center></td>
                        <td><center>
                            <?php
                            $q=$db->query("SELECT * FROM donor_registration WHERE bgroup='AB+'");
                            echo $row=$q->rowCount();
                            ?>
                        </center></td>
                    </tr>
                    <tr>
                        <td><center>AB-</center></td>
                        <td><center>
                            <?php
                            $q=$db->query("SELECT * FROM donor_registration WHERE bgroup='AB-'");
                            echo $row=$q->rowCount();
                            ?>
                        </center></td>
                    </tr>
                </table>
            </div>
            </center>
                </div>
                <div id="footer"><h4 align= "center"><font color=#fdfcfc">rakeshgk123@project</font></h4>
            <p align="center"><a href="logout.php"><font color=blue">Logout</font></a></p>
            </div>
            </div>
        </div>
    </body>
</html>