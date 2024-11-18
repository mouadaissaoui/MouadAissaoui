

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALL Projects</title>
    <link rel="stylesheet" href="../Css/StyleAdmin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
    <!-- Aside -->
    <?php include 'aside.php'; ?>
    <?php include '../Model/AllProject.php'; ?>
    <?php require_once '../Model/Edit.php';?>

    <!-- End Aside -->
    
    <!-- All Projects Section -->
    <section class="section-20">
        <div class="container-20">
            <h3 class="last-2">All Projects</h3>
            <div class="contact">
                <table class="basic-table booking-table">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Image Icon</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($AllProject as $d): ?>
                        <tr>
                            <td><?php echo $d['Id_Projects']; ?></td>
                            <td><?php echo $d['Title']; ?></td>
                            <td><img src="../photo_Admin/<?php echo $d['img']; ?>" alt="Project Image" style="max-width: 100px; max-height: 100px;"></td>
                            <td><?php echo $d['description']; ?></td>
                            <td><img src="../photo_Admin/<?php echo $d['icon_img']; ?>" alt="Icon Image" style="max-width: 50px; max-height: 50px;"></td>
                            <td><img src="../photo_Admin/<?php echo $d['icon_img_2']; ?>" alt="Icon Image" style="max-width: 50px; max-height: 50px;"></td>
                            <td><img src="../photo_Admin/<?php echo $d['icon_img_3']; ?>" alt="Icon Image" style="max-width: 50px; max-height: 50px;"></td>
                            <td><img src="../photo_Admin/<?php echo $d['icon_img_4']; ?>" alt="Icon Image" style="max-width: 50px; max-height: 50px;"></td>
                            <td><img src="../photo_Admin/<?php echo $d['icon_img_5']; ?>" alt="Icon Image" style="max-width: 50px; max-height: 50px;"></td>
                            <td><img src="../photo_Admin/<?php echo $d['icon_img_6']; ?>" alt="Icon Image" style="max-width: 50px; max-height: 50px;"></td>
                            <td><img src="../photo_Admin/<?php echo $d['icon_img_7']; ?>" alt="Icon Image" style="max-width: 50px; max-height: 50px;"></td>
                            <td><img src="../photo_Admin/<?php echo $d['icon_img_8']; ?>" alt="Icon Image" style="max-width: 50px; max-height: 50px;"></td>
                            <td><img src="../photo_Admin/<?php echo $d['icon_img_9']; ?>" alt="Icon Image" style="max-width: 50px; max-height: 50px;"></td>
                            <td>
                                <a href="EditProject.php?id=<?php echo $d['Id_Projects']; ?>" class="btn btn-primary btn-sm m-3">Edit</a>
                                <a href="../Model/deleteProject.php?id=<?php echo $d['Id_Projects']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer le projet ?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </section>
    <!-- End All Projects Section -->
</body>
</html>
