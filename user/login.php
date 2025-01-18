<?php
session_start();

include 'config_database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Fetch user into the database

    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($_POST['password'], $user['password'])) {
            $_SESSION['user_id'] = $user['SL'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];

            $message = "Login successful";

            header("Location: ../index.php?message=" . base64_encode($message));
            exit();
        } else {
            $message = "Invalid email or password";
            header("Location: ./login.php?message=" . base64_encode($message));
            exit();
        }
    } else {
        $message = "No user found with this email";
    }
}

include '../view/login.view.php';

$conn = null;
?>