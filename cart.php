<?php
// Start or resume the session
session_start();

// Initialize variables for displaying cart contents
$cart_items = [];

// Check if the book_id and book_type_user are provided in the GET request for adding items to the cart
if (isset($_GET['book_id']) && isset($_GET['book_type_user'])) {
    // Get the book_id and book_type_user from the GET request
    $book_id = $_GET['book_id'];
    $book_type_user = $_GET['book_type_user'];

    // Check if the user ID exists in a cookie
    if (isset($_COOKIE['u_id'])) {
        $user_id = $_COOKIE['u_id'];

        // Replace these placeholders with your database credentials
        $db_host = 'localhost';
        $db_user = 'root';
        $db_pass = '';
        $db_name = 'biblioread';

        // Create a database connection
        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

        // Check the database connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch the book title based on the book_id
        $book_query = "SELECT title FROM books WHERE id = $book_id";
        $book_result = $conn->query($book_query);

        if (!$book_result) {
            echo "Error fetching book information: " . $conn->error;
            exit();
        }

        if ($book_result->num_rows == 1) {
            $book_row = $book_result->fetch_assoc();
            $book_name = $book_row['title'];

            // Insert the cart item into the "cart" table along with book_name
            $insert_query = "INSERT INTO cart (user_id, book_id, book_type, book_name) VALUES ($user_id, $book_id, '$book_type_user', '$book_name')";

            if ($conn->query($insert_query) === TRUE) {
                echo "<script>alert('Item added to cart successfully!'); setTimeout(function(){ window.location.href = 'showcart.php'; }, 1000);</script>";
            } else {
                echo "Error inserting into cart: " . $conn->error;
            }
            
            
        } else {
            echo "Book not found in the books table.";
        }

        // Close the database connection
        $conn->close();
    } else {
        echo "User ID not found in the cookie.";
        exit();
    }
}

// Fetch cart contents for the user from the cart table
if (isset($_COOKIE['u_id'])) {
    $user_id = $_COOKIE['u_id'];

    // Replace these placeholders with your database credentials
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'biblioread';

    // Create a database connection
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    // Check the database connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch cart contents for the user from the cart table
    $cart_query = "SELECT book_name, book_type, quantity FROM cart WHERE user_id = $user_id";
    $cart_result = $conn->query($cart_query);

    if ($cart_result->num_rows > 0) {
        while ($cart_row = $cart_result->fetch_assoc()) {
            $book_name = $cart_row['book_name'];
            $book_type = $cart_row['book_type'];
            $quantity = $cart_row['quantity'];

            // Store cart items in an array for later display
            $cart_items[] = [
                'book_name' => $book_name,
                'book_type' => $book_type,
                'quantity' => $quantity,
            ];
        }
    }

    // Close the database connection
    $conn->close();
}
?>

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

        <!-- Display Cart Contents -->
        <?php if (!empty($cart_items)) : ?>
            <h2>Cart Contents</h2>
            <table class='table table-striped'>
                <thead>
                    <tr>
                        <th>Book Name</th>
                        <th>Book Type</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart_items as $item) : ?>
                        <tr>
                            <td><?php echo $item['book_name']; ?></td>
                            <td><?php echo $item['book_type']; ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td>
                            <button class='btn btn-danger btn-sm' onclick='removeItem("<?php echo $item['book_id']; ?>")'>Remove</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>Your shopping cart is empty.</p>
        <?php endif; ?>

        <a href="index.php" class="btn btn-primary">Continue Shopping</a>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- JavaScript Function to Remove Cart Item -->
    <script>
        function removeItem(bookname) {
            // Use JavaScript to redirect to the PHP script with the book name as a parameter for removal
            window.location.href = `remove.php?book_name=${bookname}`;
        }
    </script>
</body>
</html>
