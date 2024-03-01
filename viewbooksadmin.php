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

// Fetch all books
$sql = "SELECT * FROM books";
$stmt = $pdo->query($sql);
$books = $stmt->fetchAll();

// Handle book removal
if (isset($_POST['remove_book'])) {
    $book_id = $_POST['book_id'];
    $sql = "DELETE FROM books WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$book_id]);
    echo "<script>alert('Book removed Successfully!');</script>";// Redirect to refresh the page after removal
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Books</title>
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
        <h2>View Books</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Description</th>
                    <th>Publication Name</th>
                    <th>Genre</th>
                    <th>Book Type</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book): ?>
                    <tr>
                        <td><?php echo $book['id']; ?></td>
                        <td><?php echo $book['title']; ?></td>
                        <td><?php echo $book['author']; ?></td>
                        <td><?php echo $book['desc_ription']; ?></td>
                        <td><?php echo $book['publication_name']; ?></td>
                        <td><?php echo $book['genre']; ?></td>
                        <td><?php echo $book['book_type']; ?></td>
                        <td><?php echo $book['price']; ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>">
                                <button type="submit" name="remove_book" class="btn btn-danger">Remove</button>
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
