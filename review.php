<!DOCTYPE html>
<html>
<head>
    <title>User Reviews</title>
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
        header {
    display: flex;
    align-items: center;
    background-color: #333;
    color: #fff;
    padding: 1rem;
    }

header img {
    max-width: 100px;
    margin-right: 1rem;
}

header h1 {
    margin: 0;
}
        
    </style>
</head>
<body>
<header>
        <a href="index.php"><img src="images/main-logo1.png" alt="Company Logo"></a>
        
    </header>
    <h1>User Reviews</h1>

    <?php
    // Replace these with your database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "biblioread";

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to retrieve reviews from the 'feedback' table
    $sql = "SELECT rating, review FROM feedback";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Rating</th><th>Review</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["rating"] . "</td>";
            echo "<td>" . $row["review"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No reviews found.";
    }

    // Close the database connection
    $conn->close();
    ?>
 
</body>

</html>
