<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>LOGIN</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-image:url("wallpaperflare.com_wallpaper (1).jpg");
      background-position: center;
      background-color: #f1f1f1;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      
    }


    .container {
      max-width: 400px;
      margin: 0 auto;
      
    }

    h2 {
      text-align: center;
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

    .password-toggle {
      margin-bottom: 16px;
    }

    .password-toggle input[type="checkbox"] {
      margin-right: 6px;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .forgot-password {
      text-align: center;
      margin-top: 10px;
    }
    .signup-link {
      text-align: center;
      margin-top: 20px;
    }
    .dropdown {
      position: absolute;
      top: 10px;
      right: 10px;
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
   <a href="index.php"> <img src="images\main-logo1.png" alt="Logo"> </a>
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
    <h2 style="color:White;">LOGIN</h2>
    <form action="loginq.php" method="POST">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" placeholder="Enter Username" required>

      <label for="password">Password:</label>
      <div class="password-toggle">
        <input type="password" id="password" name="password" placeholder="Enter Password" required>
        <input type="checkbox" onclick="togglePassword()"> Show Password
      </div>

      <input type="submit" value="Login">
      <div class="forgot-password">
        <a href="password_recovery.php">Forgot Password?</a>
      <div class="signup-link">
      <button type="button" class="btn btn-secondary" onclick="location.href='signup.html';">New to the page?Signup!</button>
  
      </div>
    </form>
  </div>
</body>
</html>