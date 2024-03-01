<?php
include('connect.php');
$uname=$email=$pwd=$add=$number=$country="";
if($_SERVER['REQUEST_METHOD'] =='POST')
{
    $uname=$_POST['name'];
    $email=$_POST['email'];
    $pwd=$_POST['password'];
    $add=$_POST['address'];
    $number=$_POST['phone'];
    $country=$_POST['country'];
   
    
$sql="INSERT INTO signup (name,email,password,address,phonenumber,country) VALUES ('$uname','$email','$pwd','$add','$number','$country')";
if($conn->query($sql)==TRUE)
{
  header('location:login.php');
}
else
{
  echo"error:".$sql."<br>".$conn->error;
}
}
?>