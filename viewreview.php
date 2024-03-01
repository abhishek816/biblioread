<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Reviews</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Book Reviews</h1>

        <div class="row">
            <div class="col-md-8">
                <?php
                include('connect.php'); // Include your database connection

                $sql = "SELECT * FROM feedback WHERE id = ?"; // Assuming book_id is used to identify the book
                $stmt = $conn->prepare($sql);
                $book_id = ['id']; // Replace with the actual book ID
                $stmt->bind_param("i", $book_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Review</h5>
                                    <p class="card-text">' . $row['review'] . '</p>
                                    <p class="card-text">Rating: ' . generateStars($row['rating']) . '</p>
                                </div>
                            </div>
                        ';
                    }
                } else {
                    echo '<p>No reviews available for this book.</p>';
                }

                $stmt->close();
                $conn->close();
                ?>

                <?php
                function generateStars($rating) {
                    $stars = '';
                    for ($i = 1; $i <= $rating; $i++) {
                        $stars .= '<i class="fas fa-star" style="color: gold;"></i>';
                    }
                    return $stars;
                }
                ?>
                <a href="pubdash.php" class="btn btn-primary">View Dashboard</a>
            </div>
        </div>
    </div>
</body>
</html>
