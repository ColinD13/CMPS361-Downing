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
    include('check_logged_in.php');
    include('create_conn.php');

    //display the players
    $get_players_query = "select * from players";
    $result = pg_query($conn,$get_players_query);

    //start of card container
    echo "<div class ='card_container'>";
    while($row = pg_fetch_assoc($result)){
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
    echo "<a class='to_add_player' href='logout.php'>Logout</a>";
    echo "</div>";

    pg_close($conn);
?>

