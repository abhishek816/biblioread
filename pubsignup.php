<?php
include('connect.php');
$uname = $pubname = $add = $number = $email = $doo = $document = $pwd = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uname = $_POST['name'];
    $pubname = $_POST['company'];
    $add = $_POST['Publication_Address'];
    $number = $_POST['phone'];
    $email = $_POST['email'];
    $doo = $_POST['date_of_origin'];
    $pwd = $_POST['password'];

    // Handle file upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["document"]["name"]);
    move_uploaded_file($_FILES["document"]["tmp_name"], $target_file);

   
        $sql = "INSERT INTO pub_signup (publishername, publicationname, publicationadrs, phonenumber, email, doo, document, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssss", $uname, $pubname, $add, $number, $email, $doo, $target_file, $pwd);

        if ($stmt->execute()) {
            header('location: publisherlogin.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "File upload failed.";
    }

?>
