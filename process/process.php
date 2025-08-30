<?php
session_start();
include '../db.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reg'])) {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if email already exists
    $check_email = $conn->prepare("SELECT id FROM Users WHERE email = ?");
    $check_email->bind_param("s", $email);
    $check_email->execute();
    $check_email->store_result();

    if ($check_email->num_rows > 0) {
        $_SESSION['error'] = "Email already registered!";
        header("Location: ../index.php"); // Redirect back
        exit;
    }

    $check_email->close();

    // Insert user into the database
    $stmt = $conn->prepare("INSERT INTO Users (username, email, password) VALUES (?, ?, ?)");
    $username = $first_name . " " . $last_name; // Create full name as username
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Registration successful! You can now login.";
        header("Location: ../index.php"); // Redirect back to main page
        exit;
    } else {
        $_SESSION['error'] = "Something went wrong. Try again.";
        header("Location: ../index.php");
        exit;
    }

    $stmt->close();
}
?>
