<?php
    session_start();
    include('../connection/conn.php');

    $event_Id = $_GET['event_id'];
    $game_type = $_GET['game_type'];    
    $game_id = $_GET['game_id'];
    
    if ($game_type == 'Basketball_Men' || $game_type == 'Basketball_Women' || $game_type == 'Vollayball_Men' || $game_type == 'Vollayball_Women' || $game_type == 'Softball_Men' || $game_type == 'Softball_Women' || $game_type == 'MLBB' || $game_type == 'Futsal_Men' || $game_type == 'Futsal_Women' || $game_type == 'Chess' || $game_type == 'Archery'){
        header("Location: teamGames.php?event_id=" . urlencode($event_Id) ."&game_id=" . urlencode($game_id). "&game_type=" . urlencode($game_type));
    }else if($game_type == 'Badminton_Men' || $game_type == 'Badminton_Women' || $game_type == 'Table_tennis_Men' || $game_type == 'Table_tennis_Women'){
        header("Location: withDCategory.php?event_id=" . urlencode($event_Id) ."&game_id=" . urlencode($game_id). "&game_type=" . urlencode($game_type));
    }else if($game_type == 'Runs_Men' || $game_type == 'Runs_Women' || $game_type == 'Throws_Men' || $game_type == 'Throws_Women' || $game_type == 'Jumps_Men' || $game_type == 'Jumps_Women'){
        header("Location: showField.php?event_id=" . urlencode($event_Id) ."&game_id=" . urlencode($game_id). "&game_type=" . urlencode($game_type));
    }


?>