<?php
    session_start();
    include('../connection/conn.php');
    
    
    $game_id = $_SESSION['GameId'];
    $event_id = $_SESSION['EventId'];
    $gameType = $_SESSION['GameType'];
    $team_id = $_SESSION['idOfTeam'];
    $team_count = $_SESSION['teamCount'];

    

?>