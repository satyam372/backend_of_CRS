<?php

include 'connection.php';
// Retrieve the base64-encoded image data
$imageData = $_POST['image'];

// Decode the base64 image data
$decodedImage = base64_decode($imageData);

// Generate a unique filename for the image
$filename = uniqid() . '.jpg';

// Set the path where you want to save the images
$uploadPath = 'C:/xampp/htdocs/php_connection/images/' . $filename;

// Save the image file
file_put_contents($uploadPath, $decodedImage);

// Connect to your MySQL database


// Check the database connection
if ($connect->connect_error) {
    die('Connection failed: ' . $connect->connect_error);
}

// Prepare the SQL statement to insert the image path into the database
$sql = "INSERT INTO image (photo) VALUES ('$uploadPath')";
$result=mysqli_query($connect,$sql);

if ($result) {
    echo 'Image saved successfully';
} else {
    echo 'Error: ' . $sql . '<br>' . $connect->error;
}

// Close the database connection
$connect->close();
?>