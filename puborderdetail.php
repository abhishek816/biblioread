<!DOCTYPE html>
<html>
<head>
    <title>Publisher Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="display-4">Customer Orders</h1>

    <?php
    // Replace with your database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "biblioread";

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the "Mark as Closed" button is clicked
    if (isset($_POST['close_order'])) {
        $order_id = $_POST['order_id'];

        // Update the order status to "Closed" in the database
        $sql = "UPDATE orders SET status = 'Closed' WHERE order_id = $order_id";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Order with ID $order_id is marked as Closed.');</script>";
        } else {
            echo "<script>alert('Error updating order: . $conn->error');</script>";
        }
    }

    // Retrieve and display orders
    $sql = "SELECT user_name, user_address, user_phonenumber, bookname, price, book_type_user, order_id, status FROM orders";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<div class="table-responsive">';
        echo '<table class="table table-bordered">';
        echo '<thead class="thead-dark">
            <tr>
                <th>User Name</th>
                <th>User Address</th>
                <th>User Phone Number</th>
                <th>Book Name</th>
                <th>Price</th>
                <th>Book Type</th>
                <th>Order ID</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>';

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["user_name"] . "</td>";
            echo "<td>" . $row["user_address"] . "</td>";
            echo "<td>" . $row["user_phonenumber"] . "</td>";
            echo "<td>" . $row["bookname"] . "</td>";
            echo "<td>" . $row["price"] . "</td>";
            echo "<td>" . $row["book_type_user"] . "</td>";
            echo "<td>" . $row["order_id"] . "</td>";
            echo "<td>" . $row["status"] . "</td>";
            echo "<td>";
            if ($row["status"] != 'Closed') {
                echo "<form method='post'>
                    <input type='hidden' name='order_id' value='" . $row["order_id"] . "'>
                    <input type='submit' name='close_order' class='btn btn-danger' value='Mark as Closed'>
                  </form>";
            } else {
                echo "Closed";
            }
            echo "</td>";
            echo "</tr>";
        }

        echo '</table>';
        echo '</div>';
    } else {
        echo "No orders found.";
    }

    $conn->close();
    ?>
    <a href="pubdash.php" class="btn btn-primary">View Dashboard</a>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
