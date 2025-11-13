<?php
    function logActivity($user_id, $activity_type, $activity_description){
        include('create_conn.php');

        if (!isset($conn)) {
            die("Database connection not established.");
        }

        $ipAddress = $_SERVER['REMOTE_ADDR'];
        $userAgent = $_SERVER['HTTP_USER_AGENT'];

        $sql = "insert into user_activity_logging(user_id,activity_type,activity_description,ip_address,user_agent) VALUES ($1, $2, $3, $4, $5)";

        $result = pg_query_params($conn, $sql,array($user_id, $activity_type, $activity_description, $ipAddress, $userAgent));

        if(!$result){
            echo "Query failed : " . pg_last_error($conn);
        }
        
        // pg_close($conn);
    }


?>