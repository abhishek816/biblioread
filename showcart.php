<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Shopping Cart</h1>
        <hr>

        <?php
        session_start();

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

            $cart_query = "SELECT book_name, book_type,price FROM cart WHERE user_id = $user_id";
            $cart_result = $conn->query($cart_query);

            if ($cart_result->num_rows > 0) {
                echo "<h2>Cart Contents</h2>";
                echo "<table class='table table-striped'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>Book Name</th>";
                echo "<th>Book Type</th>";
                
                
                echo "<th>Action</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                while ($cart_row = $cart_result->fetch_assoc()) {
                    $book_name = $cart_row['book_name'];
                    $book_type = $cart_row['book_type'];
                    
                   

                    echo "<tr>";
                    echo "<td>{$book_name}</td>";
                    echo "<td>{$book_type}</td>";
                   
                    
                    echo "<td><button class='btn btn-danger btn-sm' onclick='removeItem(\"$book_name\")'>Remove</button></td>";
                    echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<p>Your shopping cart is empty.</p>";
            }

            $conn->close();
        } else {
            echo "User ID not found in the cookie.";
        }
        ?>

        <a href="index.php" class="btn btn-primary">Continue Shopping</a>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- JavaScript Function to Remove Cart Item -->
    <script>
        function removeItem(bookname) {
            window.location.href = `remove.php?book_name=${bookname}`;
        }
    </script>
</body>
</html>
