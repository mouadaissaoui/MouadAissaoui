<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['nom'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['contact'] ?? '';

    // Check if fields are not empty
    if (!empty($firstName) && !empty($message) && !empty($email)) {
        if ($con) {
            $checkStmt = $con->prepare("SELECT * FROM contact WHERE email = :email");
            $checkStmt->bindParam(':email', $email);
            $checkStmt->execute();

            if ($checkStmt->rowCount() > 0) {
                $jsAlert = 'Error: Email already Send To Message.';
            } else {
                // Proceed with inserting the data
                $stmt = $con->prepare("INSERT INTO contact (nom, email, contact) VALUES (:nom, :email, :contact)");
                $stmt->bindParam(':nom', $firstName);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':contact', $message);

                if ($stmt->execute()) {
                    $jsAlert = '✔ Message sent successfully!';
                } else {
                    $jsAlert = 'Error: ' . $stmt->errorInfo()[2];
                }
            }
        } else {
            $jsAlert = 'Error: Database connection failed.';
        }
    } else {
        $jsAlert = 'Please fill out all required fields.';
    }

    // Send the JS alert with the message
    echo "<script>var jsAlert = '" . addslashes($jsAlert) . "';</script>";
}
?>
