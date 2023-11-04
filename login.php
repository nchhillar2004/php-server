<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch user from the database
    $query = $db->prepare("SELECT id, username, password FROM users WHERE username = :username");
    $query->bindParam(':username', $username);
    $query->execute();
    $user = $query->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Successful login
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['username'];
        header('Location: application.php'); // Redirect to the application page
    } else {
        echo "Invalid username or password. Please try again.";
    }
}
?>
