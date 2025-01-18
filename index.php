<?php
session_start();

include './database.php';

$sql = "SELECT * FROM student";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $result = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $result = [];
}

include_once './functions.php';

$isLoggedIn = isLoggedIn();
$message = isset($_GET['message']) ? base64_decode($_GET['message']) : '';

include './view/index.view.php';

$conn->close();

?>