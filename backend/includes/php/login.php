<?php
session_start();

// Include the database configuration or connect to your database

include "../../backend/Database/DB_connect.php";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute a statement to retrieve the hashed password from the database
    $stmt = $conn->prepare("SELECT username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($dbUsername, $dbPassword);
    $stmt->fetch();
    $stmt->close();

    // Verify the password
    if ($dbUsername && password_verify($password, $dbPassword)) {
        // Password is correct, start a session
        $_SESSION['username'] = $username;

        // Redirect to a dashboard or home page
        header("Location: ../../front-end/PanicButton/index.php");
        exit();
    } else {
        // Invalid username or password
        echo "Invalid username or password.";
    }
}

// Close the database connection
$conn->close();
?>
