<?php
if (isset($_GET['book_id']) && isset($_GET['book_type_user'])) {
    $book_id = $_GET['book_id'];
    $book_type = $_GET['book_type_user']; // Corrected this line

    // Retrieve user ID from the cookie
    if (isset($_COOKIE['u_id'])) {
        $u_id = $_COOKIE['u_id'];
    } else {
        echo "User ID not found in the cookie.";
        exit();
    }

    // Replace these placeholders with your database credentials
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'biblioread';

    // Connect to the database
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch user information from the "signup" table
    $user_query = "SELECT name, address, phonenumber FROM signup WHERE u_id = $u_id";
    $user_result = $conn->query($user_query);

    if (!$user_result) {
        echo "Error fetching user information: " . $conn->error;
        exit();
    }

    if ($user_result->num_rows == 1) {
        $user_row = $user_result->fetch_assoc();
        $user_name = $user_row['name'];
        $user_address = $user_row['address'];
        $user_phonenumber = $user_row['phonenumber'];
    } else {
        echo "User not found in the signup table.";
        exit();
    }

    // Fetch book information from the "books" table based on the book ID
    $book_query = "SELECT title, book_type, price FROM books WHERE id = $book_id";
    $book_result = $conn->query($book_query);

    if (!$book_result) {
        echo "Error fetching book information: " . $conn->error;
        exit();
    }

    if ($book_result->num_rows == 1) {
        $book_row = $book_result->fetch_assoc();
        $book_name = $book_row['title'];
        
        $book_type_db = $book_type; 
        $book_price = $book_row['price'];
    } else {
        echo "Book not found in the books table.";
        exit();
    }

    // Insert the order into the "orders" table
    $insert_query = "INSERT INTO orders (u_id, user_name, user_address, user_phonenumber, bookname, book_type_user, price)
                     VALUES ($u_id, '$user_name', '$user_address', '$user_phonenumber', '$book_name', '$book_type_db', $book_price)";

    if ($conn->query($insert_query) === TRUE) {
        echo '<script>alert("Order placed Successfully!!");</script>';
echo '<script>window.location="vieworders.php";</script>';
    } else {
        echo "Error placing order: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "No order data submitted.";
}
?>
