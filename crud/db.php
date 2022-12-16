<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "clientdata";

$con = mysqli_connect($servername,$username,$password,$databasename,4308);

if($con)
{
    // echo "Connection Succed..";
}
else
{
    echo "Connection Failed..".mysqli_connect_error();
}
?>