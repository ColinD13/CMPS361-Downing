<?php
     $host = "localhost";
     $port = "5432";
     $dbname = "FirstDatabase";
     $user = "postgres";       
     $password = "PASSWORD";
     //dont want to put my password on GITHUB

     $conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

     if (!$conn) {
        echo "Connection failed to $dbname " . pg_last_error();
     } else {
         echo "Connected to $dbname";
     }
    
     $query = "SELECT * FROM users";
     $result = pg_query($conn, $query);

     if(!$result){
        echo "No result from query";
     }
     else{
        while($row = pg_fetch_assoc($result)){
            echo "<br>";
            print_r($row);
            echo "<br>";
        }
     }

    pg_close($conn);
?>