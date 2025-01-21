<?php
include '../database.php';

if (isset($_GET['sl'])) {
    $sl = $_GET['sl'];

    $sql = "SELECT * FROM student WHERE SL=$sl";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();

        // echo '<img src="assets/student_img/ '.$img .'">';
        echo '<img src="assets/student_img/' .@$student["filename"]. '" class="student-img mb-3">';
        echo '<h5 >' . htmlspecialchars($student['Name']) . '</h5>';
        echo '<p class="text-start"><strong>Address:</strong> ' . htmlspecialchars($student['Address']) . '</p>';
        echo '<p class="text-start"><strong>Phone:</strong> ' . htmlspecialchars($student['Phone']) . '</p>';
        echo '<p class="text-start"><strong>Created At:</strong> ' . htmlspecialchars($student['created_at']) . '</p>';
    } else {
        echo "Student not found.";
        exit;
    }
} else {
    echo "No student selected for view.";
    exit;
}

$conn->close();


?>