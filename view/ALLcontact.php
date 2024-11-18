<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Contacts</title>
    <link rel="stylesheet" href="../css/StyleAdmin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- Aside -->
    <?php include 'aside.php'; ?>
    <?php include '../Model/ModelAllContact.php'; ?>
    <!-- End Aside -->

    <!-- All Contacts Section -->
    <?php
    $result = AllContact();
    ?>

    <section class="section-20">
        <div class="container-20">
            <h3 class="last-2">All Contacts</h3>
            <div class="contact">
                <table class="basic-table booking-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $d): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($d['id_contact']); ?></td>
                            <td><?php echo htmlspecialchars($d['nom']); ?></td>
                            <td><?php echo htmlspecialchars($d['email']); ?></td>
                            <td><?php echo htmlspecialchars($d['contact']); ?></td>
                            <td>
                                <a href="../Model/delete.php?id=<?php echo $d['id_contact']; ?>" class="btn btn-danger btn-xl"
                                    onclick="return confirm('Voulez-vous vraiment supprimer ce contact ?')">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- End Contacts Section -->
</body>
</html>
