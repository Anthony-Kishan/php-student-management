<?php
include '../database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];


    if (!ctype_digit($phone)) {
        $message = "Phone number must contain only digits.";
        header("Location: ../index.php?message=" . base64_encode($message));
        exit();
    }

    if (strlen($phone) !== 11) {
        $message = "Phone number must be 11 digits.";
        header("Location: ../index.php?message=" . base64_encode($message));
        exit();
    }

    $sql = "INSERT INTO student (Name, Address, Phone) VALUES ('$name', '$address', '$phone')";

    if ($conn->query($sql) === TRUE) {
        $message = "New student added successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }
    header("Location: ../index.php?message=" . base64_encode($message));
}

include '../view/create.view.php';

$conn->close();
?>