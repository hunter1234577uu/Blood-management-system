<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Exchange Blood List</title>
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
            <h1>Exchange Blood List</h1>
            <center><div id="form">
                <table>
                    <tr>
                        <td><center><b><font color="blue">Name</font></b></center></td>
                        <td><center><b><font color="blue">Father's Name</font></b></center></td>
                        <td><center><b><font color="blue">Address</font></b></center></td>
                        <td><center><b><font color="blue">City</font></b></center></td>
                        <td><center><b><font color="blue">Age</font></b></center></td>
                        <td><center><b><font color="blue">Blood Group</font></b></center></td>
                        <td><center><b><font color="blue">Exchange Blood Group</font></b></center></td>
                        <td><center><b><font color="blue">Mobile No</font></b></center></td>
                        <td><center><b><font color="blue">E-Mail</font></b></center></td>
                    </tr>
                    <?php
                    $q=$db->query("SELECT * FROM exchange_b");
                    while($r1=$q->fetch(PDO::FETCH_OBJ))
                    {
                        ?>
                    <tr>
                        <td><center><?= $r1->name;?></center></td>
                        <td><center><?= $r1->fname;?></center></td>
                        <td><center><?= $r1->address;?></center></td>
                        <td><center><?= $r1->city;?></center></td>
                        <td><center><?= $r1->age;?></center></td>
                        <td><center><?= $r1->bgroup;?></center></td>
                        <td><center><?= $r1->exbgroup;?></center></td>
                        <td><center><?= $r1->mno;?></center></td>
                        <td><center><?= $r1->email;?></center></td>
                    </tr>
                        <?php
                    }
                    ?>
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