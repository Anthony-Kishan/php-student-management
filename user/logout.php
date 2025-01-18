<?php
session_start();
session_unset();
session_destroy();

$message = "You have successfully logged out!";
header("Location: ../index.php?message=" . base64_encode($message));
exit();
?>