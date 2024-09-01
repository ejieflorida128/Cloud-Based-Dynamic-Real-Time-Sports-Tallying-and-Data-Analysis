<?php

session_start();
include('../connection/conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Set1 = $_POST['Set1'];
    $Set2 = $_POST['Set2'];
    $Set3 = $_POST['Set3'];
    $PlayerID = $_POST['PlayerId'];
    $check = $_POST['check'];
    $event_id = $_SESSION['EVENT_ID'];
    $game_id = $_SESSION['GAME_ID'];



   
        $Set1 = floatval($Set1);
        $Set2 = floatval($Set2);
        $Set3 = floatval($Set3);

        
        $update = "UPDATE players SET Set1 = '$Set1', Set2 = '$Set2', Set3 = '$Set3' WHERE id = '$PlayerID'";
        mysqli_query($conn, $update);
    
        
    
        header('Location: jumps.php?event_id='.urldecode($_SESSION['EVENT_ID']).'&game_id='.urldecode($_SESSION['GAME_ID']).'&game_type='.urldecode($_SESSION['GAME_TYPE']).'&meter='.urldecode($_SESSION['METER']));
        exit(); 
    


   
}

?>