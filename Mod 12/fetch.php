<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include("create_conn.php");

    ///fetch
    $sql = "select metric, value, description, time_created from metrics order by time_created desc";
    $result = pg_query($conn, $sql);
    $data = pg_fetch_all($result);
    $json = json_encode($data);
    header('Content-Type: application/json');
    echo json_encode($data ?: []);
    flush();
?>
