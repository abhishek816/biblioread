<?php
session_start();

// Check if the user is logged in
if (!isset($_COOKIE['a_id'])) {
    header("Location: admin_login.php");
    exit();
}

// Database connection (update with your own database details)
try {
    $pdo = new PDO("mysql:host=localhost;dbname=biblioread", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$admin_id = $_COOKIE['a_id'];

// Check if the admin is logged in
$sql = "SELECT * FROM adminlogin WHERE a_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$admin_id]);
$admin = $stmt->fetch();

if (!$admin) {
    header("Location: admin_login.php");
    exit();
}

// Fetch pending publishers with their BLOB data
$sql = "SELECT * FROM pub_signup WHERE approval_status = 'pending'";
$stmt = $pdo->query($sql);
$pending_publishers = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add custom CSS styles -->
    <style>
        /* Custom styles for the header */
        .navbar {
            background-color: #333; /* Dark background color */
        }

        .navbar-brand img {
            max-height: 40px; /* Adjust the max height as needed */
        }

        .container {
            margin-top: 20px;
        }
        .publisher-card {
            margin-bottom: 20px;
        }
        .publisher-image {
            max-width: 100%;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark">
        <a class="navbar-brand" href="#">
            <img src="images/main-logo1.png" alt="Logo">
        </a>
        <ul class="nav">
  
  <li class="nav-item">
    <a class="nav-link" href="viewbooksadmin.php">View Books</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="viewaudiobookadmin.php">View Audiobooks</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="viewuseradmin.php">View Users</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="viewpublisheradmin.php">View Publishers</a>
  </li>
  
</ul>
    </ul>
    </nav>
    <div class="container">
        <h1>Welcome, <?php echo $admin['adminname']; ?> (Admin)</h1>
        <h2>Pending Publisher Approvals:</h2>
        <div class="row">
            <?php foreach ($pending_publishers as $publisher): ?>
                <div class="col-md-4 publisher-card">
                    <div class="card">
                        <!-- Display the image using base64 encoding -->
                        <img class="publisher-image card-img-top" src="<?php echo $publisher['document']; ?>" alt="Publisher Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $publisher['email']; ?></h5>
                            <form action="approve_publisher.php" method="post">
                                <input type="hidden" name="user_id" value="<?php echo $publisher['id']; ?>">
                                <button type="submit" name="action" value="approve" class="btn btn-success">Approve</button>
                            </form>
                            <form action="reject_publisher.php" method="post">
                                <input type="hidden" name="user_id" value="<?php echo $publisher['id']; ?>">
                                <button type="submit" name="action" value="reject" class="btn btn-danger">Reject</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <a href="admin_logout.php" class="btn btn-secondary">Logout</a>
    </div>

    <!-- Add Bootstrap JS and jQuery scripts here -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
