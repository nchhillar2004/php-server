<?php
session_start();
if (isset($_SESSION['server_id'])) {
    $server_id = $_SESSION['server_id'];

    $db = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
    $query = $db->prepare("SELECT server_name, members FROM servers WHERE server_id=:server_id");
    $query->bindParam(':server_id', $server_id);
    $query->execute();
    $servers = $query->fetch();
    $_SESSION['server_name'] = $servers['server_name'];
} else {
    echo "User is not associated with any server.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chat</title>
    <!-- Add your CSS styles here -->
</head>
<body>
    <h1>Joined : <i><?php echo $_SESSION['server_name'] ?></i></h1>
    <div class="chat-container">
        <div class="chat-messages">
            <!-- Display chat messages here -->
        </div>
        <div class="chat-input">
            <input type="text" id="message" placeholder="Type your message">
            <button id="send">Send</button>
        </div>
    </div>

    <script>
        // Add JavaScript code to handle chat functionality
        const messageInput = document.getElementById("message");
        const sendButton = document.getElementById("send");
        const chatMessages = document.querySelector(".chat-messages");

        sendButton.addEventListener("click", () => {
            const message = messageInput.value;
            // Send the message to the server using AJAX or WebSockets.
            // Append the message to the chatMessages div once it's sent.
            // You'll need server-side code to handle message sending and receiving.
        });
    </script>
</body>
</html>
