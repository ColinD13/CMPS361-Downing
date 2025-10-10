<?php
    //start session

    session_start();

    include('create_conn.php');

    //get user account info
    $user_post = $_POST["username"];
    $pass_post = $_POST["password"];

    //sql
    $sql = "select * from users where username=$1";
    $result = pg_query_params($conn,$sql,array($user_post));

    if(pg_num_rows($result) > 0){
        $user_fetch = pg_fetch_assoc($result);

        if(hash_equals($user_fetch['password'], crypt($pass_post, $user_fetch['password']))){

            $_SESSION['username'] = $user_fetch["username"];

            header("Location: players.php");

        } else {
            header ("Location: login.php?error=fail_login");
            exit();
        }

        pg_close($conn);
    }
    else {
        // user not found
        header("Location: login.php?error=fail_login");
        exit();
    }
?>