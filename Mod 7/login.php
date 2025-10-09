<!DOCTYPE html>
<html lang="en">

<head>
    <title>Players Login</title>
</head>

<body>
    <h2>Login Authentication</h2>

    <form action="auth.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" required>
        <br>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>

<?php

?>