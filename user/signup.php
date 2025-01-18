<?php
session_start();

include 'config_database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Insert user into the database
    $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {

        $message = "Registration Successfull!";
    } else {
        $message = "Error: " . $conn->error;
    }
    header("Location: ../index.php?message=" . base64_encode($message));
}

include '../view/signup.view.php';

$conn = null;
?>