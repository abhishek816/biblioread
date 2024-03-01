<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Order Details</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Book Name</th>
                    <th>Book Type</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if the user is logged in (you should have a login mechanism for this)
                if (isset($_COOKIE['u_id'])) {
                    $u_id = $_COOKIE['u_id'];
                    $totalSum = 0; // Initialize the total sum

                    // Perform a database query to retrieve the user's orders
                    $dbHost = 'localhost';
                    $dbUser = 'root';
                    $dbPass = '';
                    $dbName = 'biblioread';

                    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $query = "SELECT order_id, bookname, book_type_user, price, status FROM orders WHERE u_id = $u_id";
                    $result = $conn->query($query);

                    if ($result === false) {
                        die("Query error: " . mysqli_error($conn));
                    }

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['bookname'] . "</td>";
                            echo "<td>" . $row['book_type_user'] . "</td>";
                            echo "<td>" . $row['price'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            echo "<td>
                                <form method='POST' action='cancel.php'>
                                    <input type='hidden' name='order_id' value='{$row['order_id']}'>
                                    <button type='submit' class='btn btn-danger' name='cancel_order'>Cancel</button>
                                </form>
                            </td>";
                            echo "</tr>";

                            // Update the total sum
                            $totalSum += $row['price'];
                        }

                        // Display the total sum at the end of the table
                        echo "<tr><td colspan='2'></td><td>Total: $totalSum</td><td></td></tr>";
                    } else {
                        echo "<tr><td colspan='4'>No orders found for this user.</td></tr>";
                    }

                    $conn->close();
                } else {
                    echo "<tr><td colspan='4'>Please log in to view your orders.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="user.php" class="btn btn-primary">View Dashboard</a>
    </div>
</body>
</html>
