<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <form action="logout.php" method="post">
        <button type="submit" >Logout</button>
    </form>
    <div class="main">
        <h2>Welcome '<?php echo $_SESSION['user_name'] ?>'</h2>
        <div class="card">
            <h2>Its time to create a server or join one.</h2>
            <h3>Create a server</h3>
            <a href="create.html">Create</a>
            <h3>Join a server</h3>
            <a href="join.php">Join</a>
        </div>
    </div>
</body>
</html>