<?php
$team = $_GET['team'] ?? '';
?>

<div class="team_content">
    <h2>Players on the <?php echo htmlspecialchars($team); ?></h2>
    <button id="closePopup">Close</button>
</div>
