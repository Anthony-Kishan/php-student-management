<?php
session_start();

include 'config_database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if (empty($username)) {
        $message = "Username name required";
        header("Location: ./signup.php?message=" . base64_encode($message));
        exit();
    }

    if (empty($email)) {
        $message = "Email required";
        header("Location: ./signup.php?message=" . base64_encode($message));
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Please enter a valid email address";
        header("Location: ./signup.php?message=" . base64_encode($message));
        exit();
    }

    if (empty($password)) {
        $message = "Password required";
        header("Location: ./signup.php?message=" . base64_encode($message));
        exit();
    }

    // Check if the email already exists in the database
    $sql_check_email = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql_check_email);
    $stmt->bind_param("s", $email);  // Bind the email to the SQL query
    $stmt->execute();
    $result = $stmt->get_result(); // Get the result of the query

    if ($result->num_rows > 0) {
        // Email already exists
        $message = "This email address is already registered. Please choose another one.";
        header("Location: ./signup.php?message=" . base64_encode($message));
        exit();
    }


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