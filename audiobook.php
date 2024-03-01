<?php
include('connect.php');

// Fetch audiobook information from the database
$sql = "SELECT * FROM audiobooks";
$result = $conn->query($sql);

$audiobooks = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $audiobooks[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audiobook Store</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding-top: 10px;
            min-height: 70px;
            border-bottom: #bbb 1px solid;
        }

        header h1 {
            text-align: center;
        }

        nav {
            text-align: center;
            padding: 10px 0;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
        }

        section {
            padding: 20px;
        }

        .audiobook {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            background-color: #fff;
            text-align: center;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Audiobook Store</h1>
        <nav>
            <a href="index.php">Home</a>
            
        </nav>
    </header>

    <section>
        <?php foreach ($audiobooks as $audiobook) : ?>
            <div class="audiobook">
                <h2>Tittle:<?php echo $audiobook['audio_title']; ?></h2>
                <h2>Author:<?php echo $audiobook['audio_author']; ?></h2>
                <h2>Description:<?php echo $audiobook['audio_description']; ?></h2>
                <h2>Genre:<?php echo $audiobook['audio_genre']; ?></h2>
                <audio controls>
                    <source src="<?php echo $audiobook['audio_file_path']; ?>" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </div>
        <?php endforeach; ?>
    </section>

    <footer>
        <p>&copy; 2023 Audiobook Store. All rights reserved.</p>
    </footer>
</body>
</html>
