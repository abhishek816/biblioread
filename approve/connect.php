<?php
$dbname = "biblioread";
$servername = "localhost";
$username = "root";
$password = "";
$name = $email = "" ;
$namer = $emailerr = "";
$conn =mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
{
die("connection failed: ".mysqli_connect_error());
}
?>
