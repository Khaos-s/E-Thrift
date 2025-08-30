<?php
$host = "localhost";  // Change if using a remote database
$user = "root";       // Your MySQL username (default is 'root' for XAMPP)
$pass = "";           // Your MySQL password (default is empty for XAMPP)
$dbname = "etrift"; // Your database name

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
