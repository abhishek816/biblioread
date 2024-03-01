<?php

include('connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT email, password, id, approval_status FROM pub_signup WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 0) {
        echo '<script>alert("This user does not exists");</script>';
    } else {
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $id = $row['id'];
            $approval_status = $row['approval_status'];

            if ($approval_status == 'rejected') {
                echo '<script>alert("Your account has been rejected. Please contact the administrator.");</script>';  
            } else {
                setcookie("id", $id, time() + 3600, "/");
                header('Location: pubdash.php');
                exit();
            }
        } else {
            echo '<script>alert("Invalid email or password.");</script>';  
            
        }
    }
    $stmt->close();
    $result->close();
} 
?>