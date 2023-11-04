<?php
session_start();

$db = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
$query = $db->prepare("SELECT * FROM servers ORDER BY members DESC");
$query->execute();
$servers = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Servers list</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .join-link {
            text-decoration: underline !important;
            background-color: transparent !important;
            color: blue !important;
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="card over">
            <h2>Servers List</h2>
            <?php
            if (count($servers) > 0) {
                echo "<table>";
                echo "<tr><th>ID</th><th>Server name</th><th>Members</th><th></th></tr>";

                foreach ($servers as $server) {
                    echo "<tr>";
                    echo "<td>" . $server['server_id'] . "</td>";
                    echo "<td>" . $server['server_name'] . "</td>";
                    echo "<td>" . $server['members'] . "</td>";
                    $_SESSION['server_id'] = $server['server_id'];
                    $_SESSION['members'] = $server['members'];
                    echo "<td>";
                    echo "<form action='joined.php' method='post'>";
                    echo "<input type='hidden' name='server_id' value='" . $server['server_id'] . "'>";
                    echo "<button type='submit' class='join-link'>Join</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "No Servers found.";
            }

            ?>
        </div>
        <h3>or</h3>
        <a href="create.html">Create</a>
        <br>
        <a href="application.php">Back Home</a>
    </div>
</body>

</html>