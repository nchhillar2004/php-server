<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new PDO('mysql:host=sql12.freesqldatabase.com;dbname=sql12659308', 'sql12659308', 'QWDk8EGEFg');

    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if the username is already taken
    $query = $db->prepare("SELECT id FROM users WHERE username = :username");
    $query->bindParam(':username', $username);
    $query->execute();

    if ($query->fetch()) {
        echo "Username already taken. Please choose a different one.";
    } else {
        // Insert the user into the database
        $insert = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $insert->bindParam(':username', $username);
        $insert->bindParam(':password', $password);

        if ($insert->execute()) {
            echo "Registration successful. You can now <a href='login.html'>log in</a>.";
        } else {
            echo "Registration failed. Please try again.";
        }
    }
}
?>
