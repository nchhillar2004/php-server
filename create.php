<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');

    $server_name = $_POST['server_name'];
    $server_password = $_POST['password'];

    $insert = $db->prepare("INSERT INTO servers (server_name, password) VALUES (:server_name, :password)");
    $insert->bindParam(':server_name', $server_name);
    $insert->bindParam(':password', $server_password);

    if ($insert->execute()) {
        header('Location: join.php');
    } else {
        echo "Registration failed. Please try again.";
    }
}
?>