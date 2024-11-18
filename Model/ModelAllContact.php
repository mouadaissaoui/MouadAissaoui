<?php
// Model All contact
function AllContact() {
    include 'database.php';

    try {
        $sql = "SELECT * FROM contact";
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    } catch (PDOException $e) {
        // Handle error
        echo "Error: " . $e->getMessage();
        return [];
    }
}
?>
