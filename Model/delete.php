<?php
require_once 'database.php';

$id = intval($_GET['id']);

if ($id > 0) {  // Ensure that ID is a valid positive integer
    try {
        // Prepare the SQL delete statement
        $sqlState = $con->prepare('DELETE FROM contact WHERE id_contact = ?');
        $supprimer = $sqlState->execute([$id]);

        if ($supprimer) {
            // Redirect to the ALLcontact page if deletion is successful
            header('Location: ../view/ALLcontact.php');
            exit();
        } else {
            // Log or handle the case where the deletion failed
            echo "Failed to delete the contact.";
        }
    } catch (PDOException $e) {
        // Handle potential database errors
        echo "Error: " . $e->getMessage();
    }
} else {
    // Handle the case where the id is invalid (not greater than 0)
    echo "Invalid contact ID.";
}
?>
