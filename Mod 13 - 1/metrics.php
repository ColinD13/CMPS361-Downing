<?php
    include("create_conn.php");

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $metricName = $_POST['metric_name'];
        $metricValue = $_POST['metric_value'];
        $metricDesc = $_POST['metric_desc'];

        //sql
        $sql = "insert into metrics(metric, description, value) values ($1,$2,$3)";
        $result = pg_query_params($conn, $sql,array($metricName,$metricDesc,$metricValue));
    }
?>

<form action="" method="post">
    <label for="metric_name">Metric Name</label>
    <input type="text" id="metric_name" name="metric_name" required>

    <label for="metric_value">Metric Value</label>
    <input type="text" id="metric_value" name="metric_value" required>

    <label for="metric_desc">Metric Description</label>
    <input type="text" id="metric_desc" name="metric_desc" required>

    <button type="submit">Submit</button>
</form>
