<?php
require_once '../Model/database.php';

// Fetch all projects
$sqlstate = $con->prepare("SELECT * FROM project"); // Ensure 'project' is the correct table name
$sqlstate->execute();
$AllProject = $sqlstate->fetchAll(PDO::FETCH_ASSOC);

// Check if the id is provided
$id = $_GET['id'] ?? null;
if ($id !== null) {
    // Fetch the specific project to be modified
    $sqlstate = $con->prepare("SELECT * FROM project WHERE Id_Projects = ?");
    $sqlstate->execute([$id]);
    $project = $sqlstate->fetch(PDO::FETCH_ASSOC);
}
    


if (isset($_POST['modifier'])) {
    $Title = $_POST['Title'] ?? '';
    $img = $_FILES['img'] ?? '';
    $description = $_POST['description'] ?? '';
    $file_name = $_FILES['img_icon']['name'] ?? '';

    // Check if an image is uploaded
    if (isset($_FILES['img']) && $_FILES['img']['size'] > 0) {
        $photo = $_FILES['img']['name'];
        $file_name = uniqid() . $photo;
        move_uploaded_file($_FILES['img']['tmp_name'], '../photo_Admin/' . $file_name);
    }

    // Validate form fields
    if (!empty($Title) && !empty($img['name']) && !empty($description)) {
        // Update the project in the database
        $sqlstate = $con->prepare('UPDATE project SET Title = ?, img = ?, Description = ?, icon_img = ? WHERE Id_Projects = ?');
        $sqlstate->execute([$Title, $file_name, $description, $file_name, $id]);

        // Redirect after successful update
        header('Location: ../view/ALLProject.php');
        exit;
    } else {
        echo '<div class="alert alert-danger" role="alert">Veuillez saisir le Title, la description, et la Photo du projet.</div>';
    }
}
?>
