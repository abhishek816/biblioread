<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <!-- Include Bootstrap CSS from a CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .centered-link {
            text-align: center;
            margin: 20px auto;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="index.html"><img src="images/main-logo1.png" alt="Logo" width="100"></a>
                <!-- Navbar links (if needed) -->
                <!-- You can add navigation links here -->
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title text-center">Change Password</h2>
                           
                            <form method="POST" action="changepassword0.php">
                                
                                
                                <div class="form-group">
                                    <label for="current_password">Current Password:</label>
                                    <input type="password" name="current_password" class="form-control" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="new_password">New Password:</label>
                                    <input type="password" name="new_password" class="form-control" required>
                                </div>
                                
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                </div>
                            </form>
                            <div class="centered-link">
                              <a href="pubdash.php">View Dashboard</button></a>
                         
                            </div>
                            <?php
include('connect.php');

$current_password = $new_password = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];

    // Check if the current password exists in the database
    $sql = "SELECT * FROM pub_signup WHERE password = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "Error: " . $conn->error;
        exit();
    }

    $stmt->bind_param("s", $current_password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Update the password
        $update_sql = "UPDATE pub_signup SET password = ? WHERE password = ?";
        $update_stmt = $conn->prepare($update_sql);

        if (!$update_stmt) {
            echo "Error: " . $conn->error;
            exit();
        }

        $update_stmt->bind_param("ss", $new_password, $current_password);
        $update_stmt->execute();

        // Redirect to a success page or display a success message
        echo '<script>alert("Updated password successfully.");</script>';
    } else {
        // Current password not found in the database
        echo '<script>alert("Current password is incorrect.");</script>';
    }

    $stmt->close();
    $result->close();
}
?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container text-center">
            
                &copy; 2023 BIBLIOREAD.
            
        </div>
    </footer>

    <!-- Include Bootstrap JavaScript from a CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
