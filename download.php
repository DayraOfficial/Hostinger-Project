<?php
include 'db_config.php';

if (isset($_GET['file'])) {
    $fileName = $_GET['file'];
    $filePath = "uploads/" . $fileName;

    if (file_exists($filePath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath);
        exit;
    } else {
        echo "File does not exist.";
    }
}
?>
