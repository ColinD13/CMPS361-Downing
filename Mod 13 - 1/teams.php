<!DOCTYPE html>
<html lang="en">
<head>
    <title>Teams</title>
    <link rel="stylesheet" href="./styles_players.css">
</head>
<body>
    <h1>NFL Teams</h1>

    <div class="team_popup" id="popup">
        <!-- loaded form js -->
    </div>

    <script src="popup.js"></script>
</body>
</html>
<?php
    include('check_logged_in.php');
    include('get_team_color.php');
    include('create_conn.php');

    include('activity.php');
    logActivity($_SESSION['username'],"Load Teams Page", "Teams Page Loaded");

    if (!isset($conn)) {
        die("Database connection not established.");
    }

    //display the teams
    $get_teams_query = "select * from teams";
    $result = pg_query($conn,$get_teams_query);

    //make array
    $teams = array(); // empty array to hold the results

    if($result){
        while ($row = pg_fetch_assoc($result)) {
            $teams[] = $row; 
        }
    }
    else
    {
        $teams =[];
    }

    //start of card container
    echo "<div class='card_container' id='open_popup'>";
    foreach($teams as $row){
        //to get the color of the team
        $team_name = $row["team_name"] ?? '';
        $gradient = get_color_gradient($team_name);

        echo "<div class='card team  trigger' style='--team-gradient: $gradient;' data-team='" . ($row["team_name"] ?? 'Unknown') ."'>";
        echo "<h2>" . ($row["team_name"] ?? 'Unknown') . "</h2>";
        echo "<p>" . ($row["city"] ?? 'Unknown') . "</p>";
        echo "<p>" . ($row["conference"] ?? 'Unknown') . "</p>";
        echo "<p>" . ($row["division"] ?? 'Unknown') . "</p>";
        echo "<p>" . ($row["team_id"] ?? 'Unknown') . "</p>";
        echo "</div>";
    }
    echo "</div>";
    //end of card container
    echo "<div class='to_add_player_div'>";

    echo "<a class='to_add_player' href='add_player_page.php'>Add Player</a>";
    echo "<a class='to_add_player' href='logout.php'>Logout</a>";
    echo "<a class='to_add_player' href='players.php'>Players</a>";
    echo "</div>";

    pg_close($conn);
?>