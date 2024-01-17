<?php
require_once('../../backend/Database/DB_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Perform basic validation
    if ($password !== $confirmPassword) {
        echo "Passwords do not match.";
        exit();
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into the database
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashedPassword);

    if ($stmt->execute()) {
        echo "Registration successful!";
        // Redirect to a dashboard or home page
        header("Location: ../../front-end/PanicButton/index.php");
        exit();        

    } else {
        echo "Error during registration: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
