<?php
$servername = "localhost"; // Change as per your MySQL setup
$username = "root";        // Your MySQL username
$password = "";            // Your MySQL password
$dbname = "student_info";    // Name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
