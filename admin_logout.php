<?php
// Start the session
session_start();

if (isset($_COOKIE['a_id'])) {
    // Unset or remove the admin ID cookie
    setcookie('a_id', '', time() - 3600, '/');

    // Redirect to the admin login page
    header("Location: admin_login.php");
    exit();
}
?>
