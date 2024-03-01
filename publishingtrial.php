<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publisher Dashboard</title>
    <style>
        /* CSS styling goes here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        header img {
            max-width: 100px;
            height: auto;
            margin-right: 10px;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        form {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    margin: 20px auto;
    max-width: 600px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    text-align: center; /* Center-align form content */
}

form label {
    display: block;
    text-align: left; /* Left-align labels */
    margin-bottom: 5px;
}

form input[type="text"],
form input[type="number"],
form select,
form input[type="file"] {
    width: 80%; /* Reduce the width of the input elements */
    padding: 10px;
    margin: 0 auto; /* Center-align input elements */
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 3px;
    display: block; /* Display input elements as block to stack them */
}

form .btn {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    display: inline-block; /* Display the button inline */
}

form .btn:hover {
    background-color: #0056b3;
}

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
        .centered-link {
            text-align: center;
            margin: 20px auto;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <header>
        <img src="images/main-logo1.png" alt="Logo">
        <h1>Publisher Dashboard</h1>
    </header>
    <?php
include('connect.php');

if (isset($_COOKIE['id'])) {
    $id = $_COOKIE['id'];

    // Prepare the SQL query
    $sql = "SELECT * FROM pub_signup WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error in query preparation: " . $conn->error);
    }

    // Bind the parameter
    $stmt->bind_param('s', $id);

    // Execute the query
    if (!$stmt->execute()) {
        die("Error executing query: " . $stmt->error);
    }

    // Get the result
    $result = $stmt->get_result();

    // Fetch the data
    $row = $result->fetch_assoc();

    // Close the statement
    $stmt->close();
}

$conn->close();
?>



    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="publication_name">Publication Name:</label>
        <input type="text" name="publication_name" value="<?php echo $row['publicationname']; ?>" readonly>
        
        <label for="book_title">Book Title:</label>
        <input type="text" name="book_title" required><br>

        <label for="book_author">Author:</label>
        <input type="text" name="book_author" required><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>
        
        <label for="book_genre">Genre:</label>
        <select name="book_genre">
            <option selected>Open this select menu</option>
            <option value="Non-Fiction">Non-Fiction</option>
            <option value="Fiction">Fiction</option>
            <option value="Science Fiction">Science Fiction</option>
            <option value="Novel">Novel</option>
            <option value="Drama">Drama</option>
            <option value="Kids">Kids</option>
        </select>
        <label for="book_type">Type of Book</label>
        <select name="book_type">
            <option selected>Open this select menu</option>
            <option value="E-book">E-book</option>
            <option value="Hardcopy">Hardcopy</option>
            <option value="Both Available">Both Available</option>
        </select>

        <label for="book_image">Book Image:</label>
        <input type="file" name="book_image" accept="image/*" required><br>

        <label for="book_price">Price (INR):</label>
        <input type="number" name="book_price" step="0.01" required><br>

        <input class="btn" type="submit" value="Submit">
    </form>

    <div class="centered-link">
        <a href="pubdash.php"><button type="button" class="btn btn-outline-info">View Homepage</button></a>
    </div>





    <footer>
        &copy; 2023 Publisher Dashboard
    </footer>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
</body>
</html>
