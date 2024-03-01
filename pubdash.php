<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publisher Dashboard</title>
    <style>
        /* Reset some default styles */
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        /* Header styling */
        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .logo {
            width: 50px;
            height: auto;
            margin-right: 10px;
        }

        /* Dashboard container */
        .dashboard {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f5f5f5;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Sidebar styling */
        .sidebar {
            width: 250px;
            background-color: #333;
            color: #fff;
            padding: 20px;
            float: left;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        /* Sidebar buttons */
        .sidebar a {
            display: block;
            padding: 10px 15px;
            background-color: #555;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #777;
        }

        /* Main content styling */
        .content {
            margin-left: 270px;
            padding: 20px;
        }

        /* Sample card for content */
        .card {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }

        /* Footer styling */
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
   


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Example</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include your custom CSS -->
    <link rel="stylesheet" href="custom.css">



<nav class="navbar bg-primary" data-bs-theme="dark">
  <a class="navbar-brand" href="index.php">BIBLIOREAD</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="publishingtrial.html">Publish</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#reviews">Reviews</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#pa">Publish Audiobook</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="puborderdetail.php">Order</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="changepassword0.php">Settings</a>
      </li>
      
      <li>
                        <?php
                          if (isset($_POST['logout'])) {
                           // Set the expiration time of the cookie to a time in the past to delete it
                            setcookie('id', '', time() - 3600, "/");
                            header('Location: index.php');
                            exit; // Redirect to the login page after logout
                            }

                          if (isset($_COOKIE['id'])) {
                             $user_id = $_COOKIE['id'];
                            // Perform actions that a logged-in user can do
                            echo '<a> <form method="post" action="pubdash.php">
                           <input type="submit" name="logout" value="Logout" class="logout-button">
                           </form> </a>';
                             }
                        ?>

        </li>
      </li>
    </ul>
  </div>
</nav>

<!-- Page content -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <!-- First Card -->
            <div class="card" style="width: 18rem;">
                <img src="images/R.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Publish</h5>
                  <p class="card-text">Publish your books here</p>
                  <a href="publishingtrial.php" class="btn btn-primary">Publish</a>
                </div>
              </div>
        </div>
        <div class="col-md-6">
            <!-- Second Card -->
            <div class="card" style="width: 18rem;">
                <img src="images/dims.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Reviews</h5>
                  <p class="card-text">Check Reviews</p>
                  <a href="viewreview.php" class="btn btn-primary">Reviews</a>
                </div>
              </div>
        </div>
        <div class="col-md-6">
            <!-- Third Card -->
            <div class="card" style="width: 18rem;">
                <img src="images/istockphoto-629009064-612x612.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Publish Audiobook</h5>
                  <p class="card-text">Publish your audiobook </p>
                  <a href="audiopub.php" class="btn btn-primary">Publish Audiobook</a>
                </div>
              </div>
        </div>
        <div class="col-md-6">
            <!-- Fourth Card -->
            <div class="card" style="width: 18rem;">
                <img src="images/iOS-Settings-app-icon.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Settings</h5>
                  <p class="card-text">Reset Your Password</p>
                  <a href="changepassword0.php" class="btn btn-primary">Settings</a>
                </div>
              </div>     
    </div>
</div>

<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Your custom JavaScript to show/hide pages -->



    <footer>
    
        &copy; 2023 BIBLIOREAD.
    </footer>
    
</body>
</html>
