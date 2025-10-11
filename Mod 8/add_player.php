<?php
    session_start();
    include('create_conn.php');

    //vars for the player info
    $player = $_POST["name"];
    $jersey = $_POST["jersey_number"];
    $team = $_POST["team"];
    $college = $_POST["college"];

    $add_player = "insert into players(name, jersey_number, team, college) values ($1,$2,$3,$4)";

    $result = pg_query_params($conn, $add_player,array($player,$jersey,$team,$college));

    if($result){
        header ("Location: add_player_page.php?state=added");
    }
    else{
        header ("Location: add_player_page.php?state=failed");
    }

    pg_close($conn);
?>