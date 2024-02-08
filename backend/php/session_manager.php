<?php

session_start();

function session($login, $permission) {
    // Check if the user is logged in
    if (!$login) {
        // If not logged in, redirect to the login page
        header("Location: login.php");
        exit(); // Stop further execution
    } else {
        // If logged in, check permissions
        if ($permission == 0) {
            // If permission is 0, don't include the page
            echo "You don't have permission to access this page.";
            exit(); // Stop further execution
        } else if ($permission == 1) {
            // If permission is 1, include the page
            // You can include the page content here
            echo "Page content goes here.";
        } else {
            // Handle other permission levels if needed
            echo "Unknown permission level.";
            exit(); // Stop further execution
        }
    }
}

// Example usage:
// Assume $login and $permission are defined elsewhere in your code
session($login, $permission);