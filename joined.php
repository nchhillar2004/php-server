<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['server_id'])) {
    $db = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');

    $server_id = $_POST['server_id'];
    $server_member = $_POST['members'] + 1;

    $insert = $db->prepare("UPDATE `servers` SET `members`= :members WHERE `servers`.`server_id`=:server_id");
    $insert->bindParam(':server_id', $server_id);
    $insert->bindParam(':members', $server_member);

    if ($insert->execute()) {
        $_SESSION['server_id'] = $server_id;
        header('Location: chat.php');
    } else {
        echo "Registration failed. Please try again.";
    }
}
?>
