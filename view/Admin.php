<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if the session is not set
    header('Location: login.php');
    exit();
}

// Include necessary files
include_once '../Model/database.php';
include '../Model/ModelAllContact.php';

// Fetch data
$result = AllContact();
$project = $con->query("SELECT * FROM Project")->fetchAll(PDO::FETCH_ASSOC);
$contact = $con->query("SELECT * FROM contact")->fetchAll(PDO::FETCH_ASSOC);
$username = $con->query("SELECT * FROM register")->fetchAll(PDO::FETCH_ASSOC);

// Prepare statistics queries
$sqlstate = $con->prepare("SELECT COUNT(*) as project FROM Project");
$sqlstate->execute();
$project = $sqlstate->fetch(PDO::FETCH_ASSOC);

$sqlstate = $con->prepare("SELECT COUNT(*) as contact FROM contact");
$sqlstate->execute();
$contact = $sqlstate->fetch(PDO::FETCH_ASSOC);

$sqlstate = $con->prepare("SELECT COUNT(*) as register FROM register");
$sqlstate->execute();
$register = $sqlstate->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALL Project</title>
    <link rel="stylesheet" href="../Css/StyleAdmin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <?php include 'aside.php' ; ?>
   
    <div class="main-content">
        <div class="stats">
            <div class="stat-box">
                <p><img width="50px" src="../photo_Admin/Statistique.svg" alt=""> All Projects</p>
                <h3><?php echo $project['project']; ?> </h3>
            </div>
            <div class="stat-box">
                <p><img width="50px" src="../photo_Admin/contact.svg" alt="">Total Contact</p>
                <h3><?php echo $contact['contact']; ?> </h3>
            </div>
            <div class="stat-box">
                <p><img width="50px" src="../photo_Admin/email.svg" alt="">Total Email</p>
                <h3><?php echo $contact['contact']; ?> </h3>
            </div>
            <div class="stat-box">
                <p><img width="50px" src="../photo_Admin/person.svg" alt="">Total Username</p>
                <h3><?php echo $register['register']; ?> </h3>
            </div>
        </div>

        <div class="contacts">
            <h3>Last Contact</h3>
            <table class="basic-table booking-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $d): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($d['id_contact']); ?></td>
                            <td><?php echo htmlspecialchars($d['nom']); ?></td>
                            <td><?php echo htmlspecialchars($d['email']); ?></td>
                            <td><?php echo htmlspecialchars($d['contact']); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
        </div>
        <div class="flex">

        <div class="admin-profile">
            <div class="flex-2">
            <img  src="../photo_Admin/avatar.png" alt="Admin Avatar">
            <h3>Username Admin</h3>
            <p>Maroc, Rabat</p>
            </div>
           
        </div>
        
        <div class="admin-stats">
            <div class="flex-3">
            <p>All Project: <strong>100</strong></p>
                <p>Statistique: <strong>234</strong></p>
                <p>All Username: <strong>100</strong></p>

            </div>
         </div>

        </div>
    </div>
</body>
</html>
