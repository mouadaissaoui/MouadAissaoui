<?php
session_start(); // Start the session

// Initialize error message variable
$error = ''; 

// Check if the user is logging out
if (isset($_GET['logout'])) {
    session_destroy(); // Destroy the session on logout
    header('Location: login.php');
    exit();
}

// If the user is already logged in, redirect them to the admin page
if (isset($_SESSION['user_id'])) {
    header('Location: Admin.php');
    exit();
}

// Check if the form is submitted
if (isset($_POST['login'])) {
    $_login = htmlspecialchars($_POST['username']);
    $_password = $_POST['password'];

    // Check if both fields are filled
    if (!empty($_login) && !empty($_password)) {
        require_once '../Model/database.php'; // Include the database connection

        // Prepare the SQL statement to get the user data
        $sqlstate = $con->prepare("SELECT id_register, password FROM register WHERE username = ?");
        $sqlstate->execute([$_login]);
        $row = $sqlstate->fetch(PDO::FETCH_ASSOC);

        // Check if the user exists
        if ($row) {
            $stored_hashed_password = $row['password'];
            // Verify the password
            if (password_verify($_password, $stored_hashed_password)) {
                session_regenerate_id(true); // Regenerate session ID to prevent session fixation
                $_SESSION['user_id'] = $row['id_register']; // Store the user ID in the session
                header('Location: Admin.php'); // Redirect to the admin page
                exit();
            } else {
                $error = 'Login or Password is Incorrect'; // Incorrect password error
            }
        } else {
            $error = 'Username not found'; // Username not found error
        }
    } else {
        $error = 'Login and Password are Required'; // Fields are required error
    }
}

// Debug: Dump the session data for troubleshooting
// Uncomment the line below to check session values
// var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/StyleAdmin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <img class="img" src="../photo_Admin/Admin.png" style="margin-left: 40px;" width="250px" alt="Admin">

            <!-- Display error message if any -->
            <?php if (!empty($error)): ?>
                <div class="alert alert-danger">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>

            <form method="POST">
                <div class="input-group">
                    <label for="nom">Username</label>
                    <input type="text" id="nom" name="username" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button name="login" type="submit">Login</button>
            </form>
            <p class="forgot-password"><a href="#">Forgot Password?</a></p>
        </div>
    </div>
</body>
</html>
