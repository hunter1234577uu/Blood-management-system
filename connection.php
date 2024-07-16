<?php
$db=new PDO('mysql:host=localhost;dbname=hero_bbms','root','');
if($db)
{
    echo "connected";
}
else
{
    echo "not connected";
}
?>