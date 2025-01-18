<?php
include '../database.php';

if (isset($_GET['sl'])) {
    $sl = $_GET['sl'];

    $sql = "DELETE FROM student WHERE SL=$sl";

    // Check if the query was successful
    if ($conn->query($sql) === TRUE) {
        $message = "Student deleted successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }
    header("Location: ../index.php?message=" . base64_encode($message));
} else {
    $message = "No student found with the given SL.";
}


$conn->close();