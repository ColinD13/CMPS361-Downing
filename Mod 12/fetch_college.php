<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include("create_conn.php");

    ///fetch
    $sql = "select college, count(college) as player_count from players group by college order by college desc";
    $result = pg_query($conn, $sql);
    $data = pg_fetch_all($result);
    $json = json_encode($data);
    header('Content-Type: application/json');
    echo json_encode($data ?: []);
    flush();
?>
