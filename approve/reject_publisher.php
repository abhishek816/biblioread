<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'], $_POST['action']) && $_POST['action'] === 'reject') {
    $user_id = $_POST['user_id'];

    // Your database connection code
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=biblioread", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }

    // Update the user's approval status to 'rejected'
    $sql = "UPDATE pub_signup SET approval_status = 'rejected' WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id]);

    header("Location: admindash.php");
    exit();
}
