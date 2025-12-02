<?php
    include('create_conn.php');

    if (!isset($conn)) {
        die("Database connection not established.");
    } 

    if(isset($_POST['user_input'])){
        $user_input = trim($_POST['user_input']);
        $statement = "select answer from questions_answers where question ILIKE $1";
        $result = pg_query_params($conn, $statement,array($user_input));
        

        $answers = array();
        if($result){
            while ($row = pg_fetch_assoc($result)) {
                $answers[] = $row; // push each row (associative array) into $players
            }
        }

        if($result && pg_num_rows($result) > 0){
            foreach ($answers as $value) {
                echo $value['answer'] . "<br>";
            }
        }
        else{
            echo "Sorry, Unable to answer that question" . "<br>";
        }
    }
?>