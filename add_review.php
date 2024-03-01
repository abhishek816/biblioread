<?php
include('connect.php');
$rating=$review="";
if($_SERVER['REQUEST_METHOD'] =='POST')
{
    $rating=$_POST['rating'];
    $review=$_POST['review'];

    $sql = "INSERT INTO feedback (rating,review) VALUES ('$rating', '$review')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Review submitted successfully!!");</script>';
echo '<script>window.location="index.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}