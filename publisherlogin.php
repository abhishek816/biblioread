

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Publisher Login</title>
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

    input[type="email"],
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
  <script>
    // Toggle password visibility
    function togglePassword() {
      var passwordField = document.getElementById("password");
      if (passwordField.type === "password") {
        passwordField.type = "text";
      } else {
        passwordField.type = "password";
      }
    }
  </script>
</head>
<body>
  <div class="logo">
    <a href="index.php"><img src="images\main-logo0.png" alt="Logo"></a>
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
  <h1>Publisher Login</h1>
  <form action="publogin.php" method="POST" >
    
      <div class="form-group">
        <label for="email">Email:</label>
      <input type="email" id="email" name="email" placeholder="Enter email:" required>
      

      <label for="password">Password:</label>
      <div class="password-toggle">
        <input type="password" id="password" name="password" placeholder="Enter Password" required>
        <input type="checkbox" onclick="togglePassword()"> Show Password
      </div>

      <input type="submit" value="Login">
      <div class="forgot-password">
        <a href="pub_recovery.php">Forgot Password?</a>
        <div class="signup-link">
        <button type="button" class="btn btn-secondary" onclick="location.href='publishersignup.php';">New to the page? Signup!</button>
      
      <div class="form-group">
       
      </div>
    </form>
  </div>
</body>
</html>
