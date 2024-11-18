<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>
    <link rel="stylesheet" href="../css/StyleAdmin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
<!DOCTYPE html>
<html lang="en">

<body>
  
    <!-- end dashboard -->
     <?php include '../Model/Edit.php' ;  ?>

    <div class="dashboard-content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="dashboard-list-box">
                    <h4 class="gray">Modification Les Rooms</h4>
                    <div class="table-box">

                    </div>
                    <form method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $project['Id_Projects']; ?>">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="Title" value=<?php echo $project['Title']; ?>">
                        </div>
        
                        <div class="mb-3">
    <label class="form-label">Modifier Photo</label>
    <input type="file" class="form-control" name="img">
    
    <!-- Display the current image -->
    <img src="../photo_Admin/<?php echo $project['img']; ?>" alt="Current Project Image" class="img-thumbnail mt-2" style="max-width: 200px;">
</div>

                        <div class="mb-3">
                            <label class="form-label">Modifier Icon</label>
                            <input type="file" class="form-control" name="icon_img">
                            <img src="../photo_Admin/<?php echo $project['icon_img']; ?>" alt="Current Project Image" class="img-thumbnail mt-2" style="max-width: 200px;">

                            
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <input class="form-control" type="text" name="description"
                                value="<?php echo $project['description']; ?>">
                        </div>
    
    
                        <button type="submit" style="margin-top:10px ,background-color: #6A4BC3;" name="modifier"
                            class="btn">Modifier</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    
</body>
</html>