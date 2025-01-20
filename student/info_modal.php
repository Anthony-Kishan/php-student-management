<?php
include '../database.php';

if (isset($_GET['sl'])) {
    $sl = $_GET['sl'];

    $sql = "SELECT * FROM student WHERE SL=$sl";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
        
 
        // Return the student as HTML (no need to include header or footer)
        // echo '<img src="assets/student_img/ '.$img .'">';
        echo '<img src="assets/student_img/' .@$student["filename"]. '" height="50">';
        echo '<h5>' . htmlspecialchars($student['Name']) . '</h5>';
        echo '<p><strong>Address:</strong> ' . htmlspecialchars($student['Address']) . '</p>';
        echo '<p><strong>Phone:</strong> ' . htmlspecialchars($student['Phone']) . '</p>';
        echo '<p><strong>Created At:</strong> ' . htmlspecialchars($student['created_at']) . '</p>';
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