<?php
// Retrieve the file name from the POST request
$file_name = $_POST['file_name'];

// Set the path to the directory containing the APK files
$apk_directory = 'apk/';

// Set the path to the APK file
$apk_file_path = $apk_directory . $file_name;

// Check if the file exists
if (file_exists($apk_file_path)) {
    // Set the appropriate headers for the download
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($apk_file_path) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($apk_file_path));

    // Read the file and output it to the browser
    readfile($apk_file_path);
    exit;
} else {
    // If the file does not exist, display an error message
    echo 'File not found.';
}
?>
