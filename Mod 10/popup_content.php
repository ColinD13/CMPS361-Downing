<?php
    include('check_logged_in.php');
    include('create_conn.php');

    if (!isset($conn)) {
        die("Database connection not established.");
    }  

    $team = $_GET['team'] ?? '';

    $players = []; 

    if ($team !== '') {
        $query = "select * from players where team = $1";
        $result = pg_query_params($conn, $query, array($team));

        if ($result) {
            while ($row = pg_fetch_assoc($result)) {
                $players[] = $row;
            }
        }
    }

    echo "<div class='team_content'>";
    echo "<h2>" . htmlspecialchars($team) . "</h2>";

    if (empty($players)) {
        echo "<p>No players found for this team.</p>";
    } else {
        echo "<div class='team_players_container'>";
        foreach ($players as $row) {
            $team_name = htmlspecialchars($row["team"]);

            echo "<div class='team_player'>";
            echo "<h2>" . htmlspecialchars($row["name"]) . "</h2>";
            echo "<p>College: " . htmlspecialchars($row["college"]) . "</p>";
            echo "<p>Jersey #: " . htmlspecialchars($row["jersey_number"]) . "</p>";
            echo "</div>";
        }
        echo "</div>";
    }

    echo "<button id='close_popup'>Close</button>";

    echo "</div>";

    pg_close($conn);
?>
