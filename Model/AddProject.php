<?php
include 'database.php';

// Check if the form is submitted
if (isset($_POST["B1"])) {
    $Title = $_POST['Title'] ?? '';
    $img = $_FILES['img'] ?? '';
    $description = $_POST['description'] ?? '';
    $img_icon = $_FILES['img_icon'] ?? '';
    $img_icon_2 = $_FILES['img_icon_2'] ?? '';
    $img_icon_3 = $_FILES['img_icon_3'] ?? '';
    $img_icon_4 = $_FILES['img_icon_4'] ?? '';
    $img_icon_5 = $_FILES['img_icon_5'] ?? '';
    $img_icon_6 = $_FILES['img_icon_6'] ?? '';
    $img_icon_7 = $_FILES['img_icon_7'] ?? '';
    $img_icon_8 = $_FILES['img_icon_8'] ?? '';
    $img_icon_9 = $_FILES['img_icon_9'] ?? '';

    // Check if required fields are not empty
    if (!empty($img['img']) && !empty($Title) && !empty($description) && !empty($img_icon['img_icon'])) {
        
        // Process image uploads
        $imgPath = '../photo_Admin/' . basename($img['name']);
        $iconPath = '../photo_Admin/' . basename($img_icon['name']);
        $iconPath_2 = '../photo_Admin/' . basename($img_icon_2['name']);
        $iconPath_3 = '../photo_Admin/' . basename($img_icon_3['name']);
        $iconPath_4 = '../photo_Admin/' . basename($img_icon_4['name']);
        $iconPath_5 = '../photo_Admin/' . basename($img_icon_5['name']);
        $iconPath_6 = '../photo_Admin/' . basename($img_icon_6['name']);
        $iconPath_7 = '../photo_Admin/' . basename($img_icon_7['name']);
        $iconPath_8 = '../photo_Admin/' . basename($img_icon_8['name']);
        $iconPath_9 = '../photo_Admin/' . basename($img_icon_9['name']);

        // Move uploaded files to the desired directory
        $moveSuccess = move_uploaded_file($img['tmp_name'], $imgPath) && 
                       move_uploaded_file($img_icon['tmp_name'], $iconPath) &&
                       move_uploaded_file($img_icon_2['tmp_name'], $iconPath_2) &&
                       move_uploaded_file($img_icon_3['tmp_name'], $iconPath_3) &&
                       move_uploaded_file($img_icon_4['tmp_name'], $iconPath_4) &&
                       move_uploaded_file($img_icon_5['tmp_name'], $iconPath_5) &&
                       move_uploaded_file($img_icon_6['tmp_name'], $iconPath_6) &&
                       move_uploaded_file($img_icon_7['tmp_name'], $iconPath_7) &&
                       move_uploaded_file($img_icon_8['tmp_name'], $iconPath_8) &&
                       move_uploaded_file($img_icon_9['tmp_name'], $iconPath_9);

        if ($moveSuccess) {
            if ($con) {
                // Prepare the SQL statement
                $stmt = $con->prepare("INSERT INTO project (Title, img, description, icon_img, icon_img_2, icon_img_3, icon_img_4, icon_img_5, icon_img_6, icon_img_7, icon_img_8, icon_img_9) 
                                       VALUES (:title, :img, :description, :icon_img, :icon_img_2, :icon_img_3, :icon_img_4, :icon_img_5, :icon_img_6, :icon_img_7, :icon_img_8, :icon_img_9)");
                
                // Bind parameters
                $stmt->bindParam(':title', $Title);
                $stmt->bindParam(':img', $imgPath);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':icon_img', $iconPath);
                $stmt->bindParam(':icon_img_2', $iconPath_2);
                $stmt->bindParam(':icon_img_3', $iconPath_3);
                $stmt->bindParam(':icon_img_4', $iconPath_4);
                $stmt->bindParam(':icon_img_5', $iconPath_5);
                $stmt->bindParam(':icon_img_6', $iconPath_6);
                $stmt->bindParam(':icon_img_7', $iconPath_7);
                $stmt->bindParam(':icon_img_8', $iconPath_8);
                $stmt->bindParam(':icon_img_9', $iconPath_9);

                // Execute the statement
                if ($stmt->execute()) {
                    $jsAlert = '✔ Project added successfully!';
                } else {
                    $jsAlert = 'Error: ' . implode(", ", $stmt->errorInfo());
                }
            } else {
                $jsAlert = 'Error: Database connection failed.';
            }
        } else {
            $jsAlert = 'Error: File upload failed.';
        }
    } else {
        $jsAlert = 'Please fill out all required fields.';
    }

    // Display alert
    echo "<script>alert('" . addslashes($jsAlert) . "');</script>";
}
?>
