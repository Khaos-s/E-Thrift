<?php
require_once "db.php"; // Ensure correct database connection

if (isset($_POST['reg'])) {
    $first_name = trim($_POST['first_name']);
    $last_name  = trim($_POST['last_name']);
    $email      = trim($_POST['email']);
    $password   = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password

    // Check if the email already exists
    $check_query = "SELECT id FROM Users WHERE email = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        header("Location: ../register.php?error=Email already exists");
        exit;
    }

    $stmt->close();

    // Insert new user
    $insert_query = "INSERT INTO Users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insert_query);
    $username = $first_name . " " . $last_name;
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        header("Location: ../login.php?success=Registered successfully");
    } else {
        header("Location: ../register.php?error=Registration failed");
    }

    $stmt->close();
    $conn->close();
}
?>
