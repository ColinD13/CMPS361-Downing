<!DOCTYPE html>
<html lang="en">
<head>
    <title>Players</title>
    <link rel="stylesheet" href="./styles_players.css">
</head>
<body>
    <h1>NFL Players</h1>
</body>
</html>
<?php
    session_start();
    include('create_conn.php');

    //display the players
    $get_players_query = "select * from players";
    $result = pg_query($conn,$get_players_query);

    //make array
    $players = array(); // empty array to hold the results

    while ($row = pg_fetch_assoc($result)) {
        $players[] = $row; // push each row (associative array) into $players
    }

    // * pagination
    $limit =6;
    $total_entries =  pg_num_rows($result);
    $total_pages = ceil($total_entries/$limit);

    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    if($currentPage < 1){
        $currentPage =1;
    }
    elseif($currentPage > $total_pages){
        $currentPage =$total_pages;
    }

    $startIndex = (($currentPage -1) * $limit);
    $pageData = array_slice($players,$startIndex,$limit);

    //start of card container
    echo "<div class='card_container'>";
    foreach($pageData as $row){
        echo "<div class='card'>";
        echo "<h2>" . $row["name"] . "</h2>";
        echo "<p>" . $row["team"] . "</p>";
        echo "<p>" . $row["college"] . "</p>";
        echo "<p>" . $row["jersey_number"] . "</p>";
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
    echo "</div>";

    pg_close($conn);
?>

