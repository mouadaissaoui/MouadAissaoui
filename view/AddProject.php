<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Project</title>
    <link rel="stylesheet" href="../Css/StyleAdmin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- Aside -->
    <?php include 'aside.php'; ?>
    <?php include '../Model/AddProject.php'; ?>
    <!-- End Aside -->

    <!-- Add Projects Section -->
    <section class="add-project">
        <h2 class="title">Add Project</h2>
        <div class="container-10">
            <form method="POST" enctype="multipart/form-data">
                <label>Name De Projects</label>
                <input type="text" name="Title">

                <label>Description</label>
                <input type="text" name="description">

                <label>Image</label>
                <input type="file" name="img">

                <img class="img-fluid" style="max-width: 100%; max-height: 200px; margin-top: 10px;">
                
                <label>Image Icon</label>
                <input type="file" name="img_icon">
                <img class="img-fluid" style="max-width: 100%; max-height: 200px; margin-top: 10px;">

                <div class="grid-3">
                <label>Image Icon 2</label>
                <input type="file" name="img_icon_2">
                <img class="img-fluid" style="max-width: 100%; max-height: 200px; margin-top: 10px;">

                <label>Image Icon 3</label>
                <input type="file" name="img_icon_3">
                <img class="img-fluid" style="max-width: 100%; max-height: 200px; margin-top: 10px;">

                <label>Image Icon 4</label>
                <input type="file" name="img_icon_4">
                <img class="img-fluid" style="max-width: 100%; max-height: 200px; margin-top: 10px;">

                <label>Image Icon 5</label>
                <input type="file" name="img_icon_5">
                <img class="img-fluid" style="max-width: 100%; max-height: 200px; margin-top: 10px;">

                <label>Image Icon 6</label>
                <input type="file" name="img_icon_6">
                <img class="img-fluid" style="max-width: 100%; max-height: 200px; margin-top: 10px;">

                <label>Image Icon 7</label>
                <input type="file" name="img_icon_7">
                <img class="img-fluid" style="max-width: 100%; max-height: 200px; margin-top: 10px;">

                <label>Image Icon 8</label>
                <input type="file" name="img_icon_8">
                <img class="img-fluid" style="max-width: 100%; max-height: 200px; margin-top: 10px;">

                <label>Image Icon 9</label>
                <input type="file" name="img_icon_9">
                <img class="img-fluid" style="max-width: 100%; max-height: 200px; margin-top: 10px;">

                <input type="submit" name="B1" value="Envoyer">

                </div>

            
            </form>
        </div>
    </section>
</body>
</html>
