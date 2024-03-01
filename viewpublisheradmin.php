<?php
session_start();

// Check if the user is logged in
if (!isset($_COOKIE['a_id'])) {
    header("Location: admin_login.php");
    exit();
}

// Database connection
$host = "localhost";
$dbname = "biblioread";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Check if the admin is logged in
$admin_id = $_COOKIE['a_id'];
$sql = "SELECT * FROM adminlogin WHERE a_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$admin_id]);
$admin = $stmt->fetch();

if (!$admin) {
    header("Location: admin_login.php");
    exit();
}

// Fetch all users from the "pub_signup" table
$sql = "SELECT id, publishername, publicationname, publicationadrs, phonenumber, email, doo, document FROM pub_signup";
$stmt = $pdo->query($sql);
$users = $stmt->fetchAll();

// Handle user removal
if (isset($_POST['remove_user'])) {
    $user_id = $_POST['user_id'];
    $sql = "DELETE FROM pub_signup WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id]);
    echo "<script>alert('User removed Successfully!');</script>";
    // Redirect to refresh the page after removal
    header("Location: viewpublisheradmin.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Users</title>
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add custom CSS styles -->
    <style>
        /* Custom styles here */
        .navbar {
            background-color: #333; /* Dark background color */
        }

        .navbar-brand img {
            max-height: 40px; /* Adjust the max height as needed */
        }

        body {
            background-color: #f4f4f4;
        }
        .container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-dark">
        <a class="navbar-brand" href="index.php">
            <img src="images/main-logo1.png" alt="Logo">
        </a>
    </nav>
    <div class="container">
        <h1>Welcome, <?php echo $admin['adminname']; ?> (Admin)</h1>
        <h2>View Users</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Publisher Name</th>
                    <th>Publication Name</th>
                    <th>Publication Address</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Date of Origin</th>
                    
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['publishername']; ?></td>
                        <td><?php echo $user['publicationname']; ?></td>
                        <td><?php echo $user['publicationadrs']; ?></td>
                        <td><?php echo $user['phonenumber']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['doo']; ?></td>
                        
                        <td>
                            <form method="post">
                                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                <button type="submit" name="remove_user" class="btn btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="admindash.php" class="btn btn-primary">Admin Dashboard</a>
        <a href="admin_logout.php" class="btn btn-secondary">Logout</a>
    </div>

    <!-- Add Bootstrap JS and jQuery scripts here -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
