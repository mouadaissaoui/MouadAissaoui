<?php
session_start(); // Start the session

// Check if the user is logged in (optional check, not strictly necessary in logout)
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Destroy the session data
session_destroy();

// Redirect to the login page
header('Location: login.php');
exit(); // Always call exit to stop further script execution
?>
