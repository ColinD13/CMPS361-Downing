<!DOCTYPE html>
<html lang="en">
<head>
    <title>Teams</title>
    <link rel="stylesheet" href="./styles_players.css">
</head>
<body>
    <h1>NFL Teams</h1>
</body>
</html>
<?php
    include('get_team_color.php');
    include('check_logged_in.php');
    include('create_conn.php');

    //display the teams
    $get_teams_query = "select * from teams";
    $result = pg_query($conn,$get_teams_query);

    //make array
    $teams = array(); // empty array to hold the results

    while ($row = pg_fetch_assoc($result)) {
        $teams[] = $row; 
    }

    //start of card container
    echo "<div class='card_container'>";
    foreach($teams as $row){
        //to get the color of the team
        $team_name = $row["team_name"];
        $gradient = get_color_gradient($team_name);

        echo "<div class='card' style='--team-gradient: $gradient;'>";
        echo "<h2>" . $row["team_name"] . "</h2>";
        echo "<p>" . $row["city"] . "</p>";
        echo "<p>" . $row["conference"] . "</p>";
        echo "<p>" . $row["division"] . "</p>";
        echo "<p>" . $row["team_id"] . "</p>";
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

