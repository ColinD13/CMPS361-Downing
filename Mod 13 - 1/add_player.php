<?php
    session_start();
    include('create_conn.php');

    if (!isset($conn)) {
        die("Database connection not established.");
    }    

    //vars for the player info
    $player = $_POST["name"] ?? '';
    $jersey = $_POST["jersey_number"] ?? '';
    $team = $_POST["team"] ?? '';
    $college = $_POST["college"] ?? '';

    $add_player = "insert into players(name, jersey_number, team, college) values ($1,$2,$3,$4)";

    //add question and answer for each new player added\

    $addQuestion_team = "insert into questions_answers(question, answer) values ('Who does ' || $1 || ' play for?', $2)";
    pg_query_params($conn, $addQuestion_team,array($player,$team));

    $addQuestion_college = "insert into questions_answers(question, answer) values ('What college did ' || $1 || ' play for?', $2)";
    pg_query_params($conn, $addQuestion_college,array($player,$college));

    $addQuestion_jersey = "insert into questions_answers(question, answer) values ('What jersey number does ' || $1 || ' wear?', $2)";
    pg_query_params($conn, $addQuestion_jersey,array($player,$jersey));

    $result = pg_query_params($conn, $add_player,array($player,$jersey,$team,$college));

    if($result){
        header ("Location: add_player_page.php?state=added");
    }
    else{
        header ("Location: add_player_page.php?state=failed");
    }

    pg_close($conn);
?>