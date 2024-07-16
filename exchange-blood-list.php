
<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Exchange Blood Registration</title>
        <link rel="stylesheet" href="style1.css">
    </head>
    <body>
        <div id="full">
            <div id="inner-full">
                <div id="header"><h2><a href="admin-home.php" style="text-decoration: none;color: white;">Blood Bank Management System</a></h2></div>
                <div id="body">
                    <?php
                    $un=$_SESSION['un'];
                    if(!$un)
                    {
                        header("Location:index.php");
                    }
                    ?>
            <h3>Exchange Blood Registration</h3>
            <center><div id="form">
                <form action="" method="post">
                <table>
                    <tr>
                        <td width="300px" hight="100px">Enter Name</td>
                        <td width="300px" hight="100px"><input type="text" name="name" placeholder="Enter Name"></td>
                        <td width="300px" hight="50px">Enter Father's Name</td>
                        <td width="300px" hight="50px"><input type="text" name="fname" placeholder="Enter Father Name">
                        </td>
                </tr>
                <tr>
                    <td width="300px" hight="50px">Enter Address</td>
                    <td width="300px" hight="50px"><textarea name="address"></textarea></td>
                    <td width="300px" hight="50px">Enter City</td>
                    <td width="300px" hight="50px"><input type="text" name=City" placeholder="Enter City"></td>
                </tr>
                <tr>
                    <td width="300px" hight="50px">Enter Age</td>
                    <td width="300px" hight="50px"><input type="text" name="age" placeholder="Enter Age"></td>
                    <td width="300px" hight="50px">Enter E-Mail</td>
                    <td width="300px" hight="50px"><input type="text" name="email" placeholder="Enter E-mail"></td>
                </tr>
                <tr>
                    <td width="300px" hight="50px">Enter Mobile Number</td>
                    <td width="300px" hight="50px"><input type="text" name="mno" placeholder="Enter Mobile Number"></td>
                </tr>
                <tr>
                <td width="300px" hight="50px">Select Blood Group</td>
                    <td width="300px" hight="50px">
                        <select name= "bgroup">
                        <option>o+</option>
                        <option>AB+</option>
                        <option>AB-</option>
                        </select>
                    </td>
                <td width="300px" hight="50px">Exchange Blood Group</td>
                    <td width="300px" hight="50px">
                        <select name= "exbgroup">
                        <option>o+</option>
                        <option>AB+</option>
                        <option>AB-</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" name="sub" value="save"</td>
                </tr>
            </table>
            </form>
            <?php
            if(isset($_POST['sub']))
            {
                //fornt end data input
                $name=$_POST['name'];
                $fname=$_POST['fname'];
                $address=$_POST['address'];
                $city=$_POST['city'];
                $age=$_POST['age'];
                $bgroup=$_POST['bgroup'];
                $mno=$_POST['mno'];
                $email=$_POST['email'];
                $exbgroup=$_POST['exbgroup'];
                //fornt end data input end

                //select and insert
                $q2="select * from donor_registration where bgroup='$bgroup'";
                $st=$db->query($q2);
                $num_row=$st->fetch();
                $id=$num_row['id'];
                $name=$num_row['name'];
                $b1=$num_row['bgroup'];
                $mno=$num_row['mno'];
                $q1="INSERT INTO out_stoke_b (bname,name,mno) value(?,?,?)";
                $st1=$db->prepare($q1);
                $st1->execute([$b1,$name,$mno]);
                //select and insert end

                //delete code
                $delete_q=" delete from donor_registration where id='$id'";
                $st1=$db->prepare($delete_q);
                $st1->execute();
                //delete

                //exchange ingo insert
                $q=$db->prepare("INSERT INTO exchange_b (name,fname,address,city,age,bgroup,mno,email,exbgroup)VALUES (:name,:fname,:address,:city,:age,:bgroup,:mno,:email,:exbgroup)");
                $q->bindValue('name',$name);
                $q->bindValue('fname',$fname);
                $q->bindValue('address',$address);
                $q->bindValue('city',$city);
                $q->bindValue('age',$age);
                $q->bindValue('bgroup',$bgroup);
                $q->bindValue('mno',$mno);
                $q->bindValue('email',$email);
                $q->bindValue('exbgroup',$exbgroup);
                if ($q->execute())
                {
                    echo"<script>alert(' Registration Successful')</script>";
                }
                else
                {
                    echo"<script>alert(' Registration Unsuccessful')</script>";
                }
                //exchange info insert and
            }
            ?>
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