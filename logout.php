<?php
session_start();

// Check if the user is logged in (has an active session)
if (isset($_SESSION['user_id'])) {
    // Unset and destroy the session
    session_unset();
    session_destroy();

    // Redirect the user to the login page or any other desired page
    header('Location: login.html'); // Replace with your desired redirect location
    exit();
} else {
    // If the user is not logged in, you can redirect them to a login page or any other page.
    header('Location: login.html'); // Replace with your desired redirect location
    exit();
}
?>
