<!DOCTYPE html>
<html lang="en">
<head>
    <title>Players page</title>
</head>
<body>
    <h1>NFL Players</h1>
</body>
</html>

<?php
    session_start();
    include('create_conn.php');

    echo("<p>Username: " . $_SESSION["username"]. "</p>");

    pg_close();
?>