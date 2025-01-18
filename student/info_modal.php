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
    echo "No student selected for view.";
    exit;
}

include '../view/index.view.php';

$conn->close();
?>