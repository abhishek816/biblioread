<!DOCTYPE html>
<html>
<head>
  <title>Administrator Login</title>
  <style>
    body {
      background-image:url("wallpaperflare.com_wallpaper (1).jpg");
      background-position: center;
      background-color: #f1f1f1;
      font-family: Arial, sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;

    }

    .container {
      max-width: 400px;
      margin: 0 auto;
      
    }
    .dropdown {
      position: absolute;
      top: 10px;
      right: 10px;
    }

    h2 {
      text-align: center;
    }

    form {
      margin-top: 20px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 16px;
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
  </style>
</head>
<body>
  <div class="logo">
    <a href="index.php"> <img src="images\main-logo0.png" alt="Logo" > </a>
  </div>
  <div class="dropdown">
    <select onchange="location = this.value;">
      <option value="" disabled selected>Select User</option>
      <option value="login.php">User</option>
      <option value="admin_login.php">Admin</option>
      <option value="publisherlogin.php">Publisher</option>
    </select>
  </div>
  <div class="container">
    <h2>Administrator Login</h2>
    <form action="adminverify.php" method="POST">
      <label for="username">Administrator Name:</label>
      <input type="text" id="username" name="username" placeholder="Enter Administrator Name" required>
    
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" placeholder="Enter Password" required>
      
      <input type="submit" value="Login">
    </form>
  </div>
</body>
</html>
