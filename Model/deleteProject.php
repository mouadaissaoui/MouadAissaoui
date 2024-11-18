<?php
require_once 'database.php';

// Get the project ID and sanitize it
$id = intval($_GET['id']);
if ($id && $id > 0) {  // Ensure that ID is a valid positive integer
    try {
        // Prepare the SQL delete statement
        $sqlState = $con->prepare('DELETE FROM project WHERE Id_Projects = ?');
        $supprimer = $sqlState->execute([$id]);

        if ($supprimer) {
            // Redirect to the ALLProject page if deletion is successful
            header('Location: ../view/ALLProject.php');
            exit();
        } else {
            // Log or handle the case where the deletion failed
            echo "Failed to delete the project.";
        }
    } catch (PDOException $e) {
        // Handle potential database errors
        // Consider logging the error message to a file
        error_log("Error: " . $e->getMessage());
        echo "Error: " . $e->getMessage();
    }
} else {
    // Handle the case where the id is invalid (not greater than 0)
    echo "Invalid project ID.";
}
?>
