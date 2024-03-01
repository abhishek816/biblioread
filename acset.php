<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User Information</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        /* Custom CSS styles here */
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #343a40; /* Dark background color for the navbar */
        }
        .navbar-brand {
            color: #ffffff; /* Text color for the navbar brand */
        }
        .container {
            margin-top: 50px;
        }
        .form-label {
            font-weight: bold;
        }
        .centered-link {
            text-align: center;
            margin: 20px auto;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="index.php">
            <!-- Add your logo image source here -->
            <img src="images/main-logo1.png" alt="Logo" width="50">
            
        </a>
    </nav>

    <div class="container mt-4">
        <h2>Update User Information</h2>
        <?php
include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input from the form
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phonenumber = $_POST["phonenumber"];
    $address = $_POST["address"];

    // You should add validation and sanitization for user input here

    // Fetch the user ID from the uid cookie
    if (isset($_COOKIE['u_id'])) {
        $user_id = $_COOKIE['u_id'];

        // Update user data in the signup table
        $sql = "UPDATE signup SET name=?, email=?, phonenumber=?, address=? WHERE u_id=?";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            die("Error in query preparation: " . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param("sssss", $name, $email, $phonenumber, $address, $user_id);

        // Execute the query
        if ($stmt->execute()) {
            echo '<script>alert("User data updated successfully.");</script>';
        } else {
            die("Error updating user data: " . $stmt->error);
        }

        // Close the statement
        $stmt->close();
    } else {
        echo '<script>alert("User ID (uid) not found in cookies.");</script>';;
    }
}
?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="name" class="form-label">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phonenumber" class="form-label">Phone Number:</label>
                <input type="tel" id="phonenumber" name="phonenumber" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="address" class="form-label">Address:</label>
                <textarea id="address" name="address" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    
    <div class="centered-link">
        <a href="user.php"><button type="button" class="btn btn-outline-info">View Dashboard</button></a>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
