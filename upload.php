<?php
include 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['uploaded_file'])) {
    $uploadDir = 'uploads/';
    $fileName = basename($_FILES['uploaded_file']['name']);
    $uploadFile = $uploadDir . $fileName;

    if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $uploadFile)) {
        // Simpan metadata file di database
        $sql = "INSERT INTO files (file_name, file_path) VALUES ('$fileName', '$uploadFile')";
        if ($conn->query($sql) === TRUE) {
            echo "File uploaded successfully.";
        } else {
            echo "Database error: " . $conn->error;
        }
    } else {
        echo "File upload failed.";
    }
}
?>
