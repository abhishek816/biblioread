<?php
if (isset($_GET['id'])) {
    // Connect to the database
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=biblioread", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }

    $image_id = $_GET['id'];

    // Retrieve the image from the database based on $image_id
    $sql = "SELECT document FROM pub_signup WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$image_id]);
    $image = $stmt->fetchColumn();

    if ($image) {
        // Set the appropriate headers for the image download
        header('Content-Type: image/jpeg');
        header('Content-Disposition: attachment; filename="downloaded_image.jpg"');
        // Output the image data
        echo $image;
        exit;
    }
}
