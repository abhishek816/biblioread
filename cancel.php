<?php
if (isset($_POST['cancel_order'])) {
    // Check if the user is logged in
    if (isset($_COOKIE['u_id'])) {
        $u_id = $_COOKIE['u_id'];

        // Check if the order_id is provided in the POST data
        if (isset($_POST['order_id'])) {
            $order_id = $_POST['order_id'];

            // Perform a database query to delete the order for the user
            $dbHost = 'localhost';
            $dbUser = 'root';
            $dbPass = '';
            $dbName = 'biblioread';

            $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $query = "DELETE FROM orders WHERE u_id = $u_id AND order_id = $order_id";
            if ($conn->query($query) === TRUE) {
                // Order successfully deleted
                header('Location: vieworders.php'); // Redirect to the order view page
                exit();
            } else {
                // Error in deleting the order
                echo "Error deleting order: " . $conn->error;
            }

            $conn->close();
        } else {
            echo "Order ID not provided.";
        }
    } else {
        echo "User ID not found in the cookie.";
    }
} else {
    echo "Cancel order not requested.";
}
?>
