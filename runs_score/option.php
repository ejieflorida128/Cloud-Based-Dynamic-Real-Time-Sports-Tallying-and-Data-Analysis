<?php

session_start();
include('../connection/conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $First_Try = $_POST['raceTime'];
    $PlayerID = $_POST['PlayerId'];
    $check = $_POST['check'];
    $event_id = $_SESSION['EVENT_ID'];
    $game_id = $_SESSION['GAME_ID'];
     if(isset($_POST['team_id'])){
            $team_id = $_POST['team_id'];
     }


    if($check == '400meter'){

       

        $First_Try = floatval($First_Try);

        $update = "UPDATE players SET First_Try = '$First_Try' WHERE event_id = '$event_id' AND game_id = '$game_id' AND team_id = '$team_id' AND choose_type = '400meter'";
        mysqli_query($conn, $update);
    
        
    
        header('Location: runs.php?event_id='.urldecode($_SESSION['EVENT_ID']).'&game_id='.urldecode($_SESSION['GAME_ID']).'&game_type='.urldecode($_SESSION['GAME_TYPE']).'&meter='.urldecode($_SESSION['METER']));
        exit(); 
            

    }else{
        $First_Try = floatval($First_Try);

        
        $update = "UPDATE players SET First_Try = '$First_Try' WHERE id = '$PlayerID'";
        mysqli_query($conn, $update);
    
        
    
        header('Location: runs.php?event_id='.urldecode($_SESSION['EVENT_ID']).'&game_id='.urldecode($_SESSION['GAME_ID']).'&game_type='.urldecode($_SESSION['GAME_TYPE']).'&meter='.urldecode($_SESSION['METER']));
        exit(); 
    }


   
}

?>