
<?php
    session_start();
    include('activity.php');
    logActivity("No Login Yet","Login Page", "Login Loaded");
    //$_SESSION['logged_in'] = false;
    $error_message = "";

    //checking if the password or username are correct or wrong
    if(isset($_GET['error'])){
        if($_GET['error'] === "fail_login"){
            $error_message = "Invalid username or password";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Players Login</title>
    <link rel="stylesheet" href="./styles_login.css">
</head>

<body>
    <form action="auth.php" method="post" class="login_form">
        <h2 class="login_header">Login Authentication</h2>
        <div class="login_field">
            <label class="login_label" for="username">Username</label>
            <input class="login_input" type="text" name="username" required>
        </div>

        <div class="login_field">
            <label class="login_label" for="password">Password</label>
            <input class="login_input" type="password" name="password" required>
        </div>
        <div class="login_button_container">
            <button class="login_button" type="submit">Login</button>
        </div>
        <p class="login_error"><?=htmlspecialchars($error_message)?></p>
    </form>
</body>
</html>