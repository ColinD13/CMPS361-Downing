<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
        include('activity.php');
        logActivity($_SESSION['username'],"Logout Page", "Logout Page Loaded");
    }

    include("activity.php");
    logActivity($_SESSION['username'],"Logout", "Log Out Succeed");

    $_SESSION['username'] = "No Login Yet";
    $_SESSION['logged_in'] = false;
    header("Location: login.php");
    exit();
?>