<?php
include '../database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $filename = base64_decode($_FILES["choosefile"]["name"]);
    $tempname = $_FILES["choosefile"]["tmp_name"];
    $folder = "../assets/student_img/" . $filename;

    // Validate phone number
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

    // Move the uploaded image to the uploads folder
    if (move_uploaded_file($tempname, $folder)) {
        $sql = "INSERT INTO student (Name, Address, Phone, filename) VALUES ('$name', '$address', '$phone', '$filename')";

        if ($conn->query($sql) === TRUE) {
            $message = "New student added successfully!";
        } else {
            $message = "Error: " . $conn->error;
        }
    } else {
        $message = "Failed to upload image.";
    }

    // Redirect with a message
    header("Location: ../index.php?message=" . base64_encode($message));
}

include '../view/create.view.php';

$conn->close();
?>