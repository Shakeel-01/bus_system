<?php
session_start();
if (!isset($_SESSION['contact_Info'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}
echo "Welcome, " . $_SESSION['contact_Info']; // Display user's contact info
?>
