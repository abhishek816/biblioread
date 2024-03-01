<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Homepage</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="logo">
            <a href="index.php"><img src="images/main-logo1.png" alt="Your Logo"></a>
        </div>
    </header>
    

    <div class="book-container">
       <?php
        // Database connection parameters
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

        // Retrieve books from the database
        $sql = "SELECT * FROM books";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='book'>";
                echo "<img src='" . $row['image_path'] . "' alt='" . $row['title'] . "'><br>";
                echo "<h2>" . $row['title'] . "</h2>";
                echo "<p><strong>Author:</strong> " . $row['author'] . "</p>";
                echo "<p><strong>Publisher Name:</strong> " . $row['publication_name'] . "</p>";
                echo "<p><strong>Genre:</strong> " . $row['genre'] . "</p>";
                echo "<p><strong>Price (INR):</strong> " . number_format($row['price'], 2) . "</p>";
                
        echo "<input type='hidden' name='book_id' value='" . $row['id'] . "'>";
        echo "<input type='hidden' name='book_title' value='" . $row['title'] . "'>";
        echo "<input type='hidden' name='book_price' value='" . $row['price'] . "'>";
        
        echo "</form>";

        // Add "Buy" button
        
        echo "<input type='hidden' name='book_id' value='" . $row['id'] . "'>";
        echo "<input type='hidden' name='book_title' value='" . $row['title'] . "'>";
        echo "<input type='hidden' name='book_price' value='" . $row['price'] . "'>";
       
        echo "</form>";
        echo '<a href="details.php?books=' . urlencode($row["title"]) . '">View Details</a>';
        echo "</div>";
            }
        } else {
            echo "<p>No books available.</p>";
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>

    <a href="index.php">Back to Homepage</a>
</body>
</html>
