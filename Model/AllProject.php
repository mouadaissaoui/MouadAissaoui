<?php
// Model All contact
function Allproject() {
    include 'database.php';

    try {
        $sql = "SELECT * FROM project";
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
