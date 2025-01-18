<?php
include '../database.php';

if (isset($_GET['sl'])) {
    $sl = $_GET['sl'];

    $sql = "SELECT * FROM student WHERE SL=$sl";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
        
    } else {
        echo "Student not found.";
        exit;
    }
} else {
    echo "No student selected for editing.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sl = $_POST['sl'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $sql = "UPDATE student SET Name='$name', Address='$address', Phone='$phone' WHERE SL=$sl";

    if ($conn->query($sql) === TRUE) {
        $message = "Student updated successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }
    header("Location: ../index.php?message=" . base64_encode($message));
}

include '../view/edit.view.php';

$conn->close();
?>