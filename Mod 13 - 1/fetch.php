<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include("create_conn.php");

    ///fetch
    $sql = "select team, count(team) as player_count from players group by team order by team desc";
    $result = pg_query($conn, $sql);
    $data = pg_fetch_all($result);
    $json = json_encode($data);
    header('Content-Type: application/json');
    echo json_encode($data ?: []);
    flush();
?>
