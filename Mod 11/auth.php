<?php
    //start session

    session_start();

    include('create_conn.php');
    include('activity.php');

    if (!isset($conn)) {
        die("Database connection not established.");
    } 
    //get user account info
    $user_post = $_POST["username"] ?? '';
    $pass_post = $_POST["password"] ?? '';

    //sql
    $sql = "select * from users where username=$1";
    $result = pg_query_params($conn,$sql,array($user_post));

    if($result && pg_num_rows($result) > 0){
        $user_fetch = pg_fetch_assoc($result);

        if(hash_equals($user_fetch['password']  ?? '', crypt($pass_post, $user_fetch['password']))){

            $_SESSION['username'] = $user_fetch["username"] ?? '';
            $_SESSION['logged_in'] = true;
            logActivity($user_post,"Login", "Log In Succeed");
            header("Location: players.php");

        } else {
            logActivity($user_post,"Login", "Log In Fail");
            header ("Location: login.php?error=fail_login");
            exit();
        }

        pg_close($conn);
    }
    else {
        // user not found\
        logActivity($user_post,"Login", "Log In Fail");
        header("Location: login.php?error=fail_login");
        exit();
    }
?>