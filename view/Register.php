<?php
require_once '../Model/database.php';

$error = ''; 

if (isset($_POST['register'])) {

    $_Username = htmlspecialchars($_POST['username']);
    $_password = $_POST['password'];
    $_email = htmlspecialchars($_POST['email']);

    if (!empty($_Username) && !empty($_password) && !empty($_email)) {

        // Use password_hash for secure password storage
        $hashed_password = password_hash($_password, PASSWORD_BCRYPT);

        // Insert user data into the database
        $sqlstate = $con->prepare('INSERT INTO register (username, password, email) VALUES (?, ?, ?)');
        $sqlstate->execute([$_Username, $hashed_password, $_email]);

        header('Location: login.php');
        exit;
    } else {
        $error = 'Username, Email, and Password are mandatory.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Un Compte</title>
    <link rel="stylesheet" href="../css/StyleAdmin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="login-container">
    <div class="login-box">
        <img class="img" src="../photo_Admin/Admin.png" style="margin-left: 40px;" width="250px" alt="Admin">
        <h3>Create Un Compte</h3>

        <!-- Display error message if any -->
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button name="register" type="submit">Create Un Compte</button>
        </form>
    </div>
</div