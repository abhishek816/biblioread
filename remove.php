<?php
session_start();

if (isset($_GET['book_name'])) {
    $book_name = $_GET['book_name'];

    if (isset($_COOKIE['u_id'])) {
        $user_id = $_COOKIE['u_id'];

        $db_host = 'localhost';
        $db_user = 'root';
        $db_pass = '';
        $db_name = 'biblioread';

        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $delete_query = "DELETE FROM cart WHERE book_name = '$book_name' AND user_id = $user_id";

        if ($conn->query($delete_query) === TRUE) {
            header('Location: showcart.php');
            exit();
        } else {
            echo "Error deleting item from cart: " . $conn->error;
        }

        $conn->close();
    } else {
        echo "User ID not found in the cookie.";
        exit();
    }
} else {
    echo "Book name not provided for deletion.";
    exit();
}
?>
