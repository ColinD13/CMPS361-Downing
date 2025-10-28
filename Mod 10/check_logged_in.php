<?php
    session_start();

    if (!isset($_SESSION['logged_in'])) {
        die("Database connection not established.");
    } 

    if ($_SESSION['logged_in'] == false  ){
        header("Location: login.php");
        exit();
    }
?>