<?php
include('connect.php');
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $book_title = $_POST["book_title"];
    $book_author = $_POST["book_author"];
    $book_genre = $_POST["book_genre"];
    $book_desc=$_POST["description"];
    $booktype=$_POST["book_type"];

    // Handle image upload (you can save it to a folder)
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["book_image"]["name"]);
    move_uploaded_file($_FILES["book_image"]["tmp_name"], $target_file);
    $price=$_POST["book_price"];
    $publicatioName=$_POST["publication_name"];

    // Database connection parameters
    

    // Create a database connection
    

    // Check the connection
    
        
    

    // Insert book details into the database
    $sql = "INSERT INTO books (title, author,desc_ription,publication_name, genre,book_type, image_path,price)
            VALUES ('$book_title', '$book_author','$book_desc','$publicatioName', '$book_genre','$booktype', '$target_file','$price')";

    if ($conn->query($sql) === TRUE) {
        header("Location: allpage2.php");
        exit();
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
    <p>Book has been uploaded successfully!</p>
    <a href="index.php">Back to Upload</a>
</body>
</html>

</html>
