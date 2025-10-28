<!DOCTYPE html>
<html lang="en">
<head>
    <title>Players</title>
    <link rel="stylesheet" href="./styles_players.css">
</head>
<body>
    <h1>Welcome To The NFL Player Portal!</h1>
</body>
</html>
<?php
    include('get_team_color.php');  
    include('check_logged_in.php');
    include('create_conn.php');

    if (!isset($conn)) {
        die("Database connection not established.");
    }  

    //display the players
    $get_players_query = "select * from players";
    $result = pg_query($conn,$get_players_query);

    //make array
    $players = array(); // empty array to hold the results

    if($result){
        while ($row = pg_fetch_assoc($result)) {
            $players[] = $row; // push each row (associative array) into $players
        }
    }

    // * pagination
    $limit =6;
    if($result){
        $total_entries =  pg_num_rows($result);
    }
    else
    {
        $total_entries = 0;
    }
    $total_pages = ceil($total_entries/$limit);

    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    if($currentPage < 1){
        $currentPage =1;
    }
    elseif($currentPage > $total_pages){
        $currentPage =$total_pages;
    }

    $startIndex = (($currentPage -1) * $limit);
    $pageData = array_slice($players,(int)$startIndex,(int)$limit);

    //start of card container
    echo "<div class='card_container'>";
    foreach($pageData as $row){
        //to get the color of the team
        $team_name = $row["team"] ?? '';
        $gradient = get_color_gradient($team_name);

        echo "<div class='card' style='--team-gradient: $gradient;'>";
        echo "<h2>" . ($row["name"] ?? 'Unknown') . "</h2>";
        echo "<p>" . ($row["team"] ?? 'Unknown') . "</p>";
        echo "<p>" . ($row["college"] ?? "Unknown") . "</p>";
        echo "<p>" . ($row["jersey_number"] ?? 'Unknown') . "</p>";
        echo "</div>";
    }
    echo "</div>";
    //end of card container
    echo "<div class='to_add_player_div'>";

    //start of pagination buttons
    echo "<div class=''to_add_player_div'>";
        //pagination stuff
        if($currentPage > 1){
            echo "<a class='to_add_player' href=?page=" . ($currentPage -1) .  ">Previous \t</a>";
        }
    
        for($i =1; $i <= $total_pages; $i++){
            if($i == $currentPage){
                echo "<strong class='current_page'>$i</strong>";
            }
            else{
                echo "<a class='to_add_player' href=?page=" . $i .  ">" . $i . "\t</a>";
            }
        }
    
        if($currentPage < $total_pages){
            echo "<a class='to_add_player' href=?page=" . ($currentPage +1) . ">Next</a>";
        }
    echo "</div>";
    //end of pagination buttons

    echo "<a class='to_add_player' href='add_player_page.php'>Add Player</a>";
    echo "<a class='to_add_player' href='logout.php'>Logout</a>";
    echo "<a class='to_add_player' href='teams.php'>Teams</a>";
    echo "</div>";

    pg_close($conn);
?>