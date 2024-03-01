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

        form textarea {
            width: 80%;
            padding: 10px;
            margin: 0 auto;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            display: block;
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

    <form action="upload2.php" method="post" enctype="multipart/form-data">
        <label for="publication_name">Publication Name:</label>
        <input type="text" name="publication_name" value="<?php echo $row['publicationname']; ?>" readonly>
        
        <label for="audio_title">Audiobook Title:</label>
        <input type="text" name="audio_title" required><br>

        <label for="audio_author">Author:</label>
        <input type="text" name="audio_author" required><br>

        <label for="audio_description">Description:</label><br>
        <textarea id="audio_description" name="audio_description" rows="4" cols="50" required></textarea><br><br>
        
        <label for="audio_genre">Genre:</label>
        <select name="audio_genre">
            <option selected>Open this select menu</option>
            <option value="Non-Fiction">Non-Fiction</option>
            <option value="Fiction">Fiction</option>
            <option value="Science Fiction">Science Fiction</option>
            <option value="Novel">Novel</option>
            <option value="Drama">Drama</option>
            <option value="Kids">Kids</option>
        </select>

        <label for="audio_file">Audiobook File:</label>
        <input type="file" name="audio_file" accept=".mp3, .wav, .ogg" required><br>

        
        <input class="btn" type="submit" value="Submit">
    </form>

    <div class="centered-link">
        <a href="pubdash.php"><button type="button" class="btn btn-outline-info">View Homepage</button></a>
    </div>

    <footer>
        &copy; 2023 Publisher Dashboard
    </footer>
</body>
</html>
