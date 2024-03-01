<!DOCTYPE html>
<html>
<head>
  <title>Password Recovery</title>
  <style>
    body {
      background-image: url("wallpaperflare.com_wallpaper (2).jpg");
      background-size: 100%;
      background-position: center;
      font-family: Arial, sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    /* Add basic styling to the form */
    form {
      width: 300px;
      margin: 0 auto;
    }

    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 100px;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .logo {
      text-align: center;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      margin-bottom: 20px;
    }

    .logo img {
      width: 200px;
    }
  </style>
</head>
<body>
  <div class="logo">
    <img src="images\main-logo1.png" alt="Logo">
  </div>
  <form action="" method="POST">
    <h2>Password Recovery</h2>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <label for="new_password">New Password:</label>
    <input type="password" id="new_password" name="new_password" required pattern=".{8,}" title="Password must be at least 8 characters">
    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" required pattern=".{8,}" title="Password must be at least 8 characters">
    <input type="submit" value="Reset Password">
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Get user input
      $email = $_POST["email"];
      $newPassword = $_POST["new_password"];
      $confirmPassword = $_POST["confirm_password"];

      if ($newPassword === $confirmPassword) {
          // Passwords match
          // Connect to your database (replace with your database credentials)
          $servername = "localhost";
          $username = "root";
          $password = "";
          $database = "biblioread";

          $conn = new mysqli($servername, $username, $password, $database);

          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }

          // Check if the provided email exists in your users table
          $query = "SELECT * FROM signup WHERE email = '$email'";
          $result = $conn->query($query);

          if ($result->num_rows === 1) {
              // User with the provided email exists
              // Update the password for that user
              $updateQuery = "UPDATE signup SET password = '$newPassword' WHERE email = '$email'";
              if ($conn->query($updateQuery) === true) {
                echo '<script>alert("Password updated successfully!!");</script>';
                echo '<script>window.location="login.php";</script>';
              } else {
                  echo 'script<alert("Error updating password: ");</script>'. $conn->error;
              }
          } else {
            echo '<script>alert("Email not found in our records");</script>';
          }

          $conn->close();
      } else {
        echo '<script>alert("Passwords do no match");</script>';
      }
  }
  ?>
</body>
</html>
