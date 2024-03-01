<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - E-Book Store</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        /* Add your custom CSS styles here */
        body {
            background-color: #f8f9fa;
        }
        .dashboard {
            background-color: #fff;
            padding: 20px;
            margin: 20px;
            border-radius: 5px;
        }
        h1 {
            color: #333;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
<!-- Navigation Bar -->
<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">BIBLIOREAD</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <?php
                          if (isset($_POST['logout'])) {
                           // Set the expiration time of the cookie to a time in the past to delete it
                            setcookie('u_id', '', time() - 3600, "/");
                            header('Location: index.php');
                            exit; // Redirect to the login page after logout
                            }

                          if (isset($_COOKIE['u_id'])) {
                             $user_id = $_COOKIE['u_id'];
                            // Perform actions that a logged-in user can do
                            echo '<a> <form method="post" action="user.php">
                           <input type="submit" name="logout" value="Logout" class="logout-button">
                           </form> </a>';
                             }
                        ?>
            </li>
           
            </li>
        </ul>
    </div>
</nav>

<!-- User Dashboard Content -->
<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="images/dims.jpeg" class="card-img-top" alt="View Your Orders">
                <div class="card-body">
                    <h5 class="card-title">View Your Orders</h5>
                    <p class="card-text">View and manage your orders here.</p>
                </div>
                <div class="card-footer">
                    <a href="vieworders.php" class="btn btn-primary btn-block">View Orders</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="images/iOS-Settings-app-icon.jpg" class="card-img-top" alt="Account Settings">
                <div class="card-body">
                    <h5 class="card-title">Account Settings</h5>
                    <p class="card-text">Update your account settings.</p>
                </div>
                <div class="card-footer">
                    <a href="acset.php" class="btn btn-primary btn-block">Account Settings</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="images/cart.jpg" class="card-img-top" alt="Cart">
                <div class="card-body">
                    <h5 class="card-title">Cart</h5>
                    <p class="card-text">View and manage items in your cart.</p>
                </div>
                <div class="card-footer">
                <a href="showcart.php" class="btn btn-primary btn-block">Cart</a>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
