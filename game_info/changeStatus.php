<?php

session_start();
include('../connection/conn.php');


$game_id = $_SESSION['GameId'];
$event_id = $_SESSION['EventId'];
$gameType = $_SESSION['GameType'];
$team_id = $_SESSION['idOfTeam'];
$team_count = $_SESSION['teamCount'];

    $update = "UPDATE registered_game SET status = 'submited' WHERE id = $game_id";
    mysqli_query($conn,$update);


    header('Location: ../addGames.php?id=' . urlencode($event_id) . '&&teamCount=' . urlencode($team_count));
    exit();
    






?>