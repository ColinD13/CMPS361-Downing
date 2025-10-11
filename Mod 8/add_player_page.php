
<?php
    session_start();
    //vars
    $state = "";

    //checking if the password or username are correct or wrong
    if(isset($_GET['state'])){
        if($_GET['state'] === "added"){
            $state = "Player Added";
        }
        else if($_GET['state'] === "failed"){
            $state = "Failed To Add Player";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Players</title>
    <link rel="stylesheet" href="./styles_add_player.css">
</head>
<body>
    <form action="add_player.php" method="post" class="add_player_form">
        <h2 class="add_player_header">Player Add</h2>
        <div class="add_player_field">
            <label class="add_player_label" for="name">Name</label>
            <input class="add_player_input" type="text" name="name" required>
        </div>
        <div class="add_player_field">
            <label class="add_player_label" for="jersey_number">Jersey Number</label>
            <input class="add_player_input" type="number" name="jersey_number" required>
        </div>
        <div class="add_player_field">
            <label class="add_player_label" for="team">Team</label>
            <input class="add_player_input" type="text" name="team" required>
        </div>
        <div class="add_player_field">
            <label class="add_player_label" for="college">College</label>
            <input class="add_player_input" type="text" name="college" required>
        </div>

        <div class="add_player_button_container">
            <button class="add_player_button" type="submit">Add</button>
        </div>
        <p class="player_state"><?=htmlspecialchars($state)?></p>
    </form>
</body>
</html>
