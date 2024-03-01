<?php
include('connect.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $audio_title = $_POST["audio_title"];
    $audio_author = $_POST["audio_author"];
    $audio_genre = $_POST["audio_genre"];
    $audio_desc = $_POST["audio_description"];
    $audio_file_path = "uploads/" . basename($_FILES["audio_file"]["name"]);
    move_uploaded_file($_FILES["audio_file"]["tmp_name"], $audio_file_path);
    
    $publicationName = $_POST["publication_name"];

    // Insert audiobook details into the database
    $sql = "INSERT INTO audiobooks (publication_name, audio_title, audio_author, audio_description, audio_genre, audio_file_path)
            VALUES ('$publicationName', '$audio_title', '$audio_author', '$audio_desc', '$audio_genre', '$audio_file_path')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Audiobook uploaded successfully!!");</script>';
        echo '<script>window.location="audiobook.php";</script>';
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Complete</title>
</head>
<body>
    <p>Audiobook has been uploaded successfully!</p>
    <a href="index.php">Back to Upload</a>
</body>
</html>
