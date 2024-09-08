<?php
session_start();
include('../connection/conn.php');

$event_id = $_GET['event_id'];
$game_id = $_GET['game_id'];
$game_type = $_GET['game_type'];
$meter = $_GET['meter'];

if($meter == 'javelin') {
    $teamID = [];
    $javelinSQL = "SELECT *,
       CASE
           WHEN SET1 >= SET2 AND SET1 >= SET3 THEN SET1
           WHEN SET2 >= SET1 AND SET2 >= SET3 THEN SET2
           ELSE SET3
       END AS highest_set
        FROM players
        WHERE event_id = '$event_id'
        AND game_id = '$game_id'
        AND choose_type = 'javelin'
        ORDER BY highest_set DESC
        ";

    $javelinQuery = mysqli_query($conn,$javelinSQL);
    while($getJavelin = mysqli_fetch_assoc($javelinQuery)){
            $teamID[] = $getJavelin['team_id'];
    }
    
    // gold medal
    
        $goldSQL = "SELECT * FROM teams WHERE id = '$teamID[0]'";
        $goldQuery = mysqli_query($conn,$goldSQL);

        $goldResult = mysqli_fetch_assoc($goldQuery);

        $goldName = $goldResult['team_name'];

        $goldUpdate = "UPDATE tally SET GOLD = GOLD + 1 WHERE event_id = '$event_id' AND team_name = '$goldName'";
        mysqli_query($conn,$goldUpdate);

    // silver medal

        $silverSQL = "SELECT * FROM teams WHERE id = '$teamID[1]'";
        $silverQuery = mysqli_query($conn,$silverSQL);

        $silverResult = mysqli_fetch_assoc($silverQuery);

        $silverName = $silverResult['team_name'];

        $silverUpdate = "UPDATE tally SET SILVER = SILVER + 1 WHERE event_id = '$event_id' AND team_name = '$silverName'";
        mysqli_query($conn,$silverUpdate);

    // bronze medal

        $bronzeSQL = "SELECT * FROM teams WHERE id = '$teamID[2]'";
        $bronzeQuery = mysqli_query($conn,$bronzeSQL);

        $bronzeResult = mysqli_fetch_assoc($bronzeQuery);

        $bronzeName = $bronzeResult['team_name'];

        $bronzeUpdate = "UPDATE tally SET BRONZE = BRONZE + 1 WHERE event_id = '$event_id' AND team_name = '$bronzeName'";
        mysqli_query($conn,$bronzeUpdate);

        
        $teamID = []; //empty the array

        // update status 
        $updateStatus = "UPDATE players SET game = 'Score' WHERE game_id = '$game_id' AND event_id = '$event_id' AND choose_type = 'javelin'";
        mysqli_query($conn,$updateStatus);

        header('Location: throws.php?event_id=' . urlencode($event_id) . '&game_id=' . urlencode($game_id) . '&game_type=' . urlencode($game_type) . '&meter=' . urlencode('javelin')); 

   
}else if($meter == 'discus'){

    $teamID = [];
    $discusSQL = "SELECT *,
       CASE
           WHEN SET1 >= SET2 AND SET1 >= SET3 THEN SET1
           WHEN SET2 >= SET1 AND SET2 >= SET3 THEN SET2
           ELSE SET3
       END AS highest_set
        FROM players
        WHERE event_id = '$event_id'
        AND game_id = '$game_id'
        AND choose_type = 'discus'
        ORDER BY highest_set DESC
        ";

    $discusQuery = mysqli_query($conn,$discusSQL);
    while($getdiscus = mysqli_fetch_assoc($discusQuery)){
            $teamID[] = $getdiscus['team_id'];
    }
    
    // gold medal
    
        $goldSQL = "SELECT * FROM teams WHERE id = '$teamID[0]'";
        $goldQuery = mysqli_query($conn,$goldSQL);

        $goldResult = mysqli_fetch_assoc($goldQuery);

        $goldName = $goldResult['team_name'];

        $goldUpdate = "UPDATE tally SET GOLD = GOLD + 1 WHERE event_id = '$event_id' AND team_name = '$goldName'";
        mysqli_query($conn,$goldUpdate);

    // silver medal

        $silverSQL = "SELECT * FROM teams WHERE id = '$teamID[1]'";
        $silverQuery = mysqli_query($conn,$silverSQL);

        $silverResult = mysqli_fetch_assoc($silverQuery);

        $silverName = $silverResult['team_name'];

        $silverUpdate = "UPDATE tally SET SILVER = SILVER + 1 WHERE event_id = '$event_id' AND team_name = '$silverName'";
        mysqli_query($conn,$silverUpdate);

    // bronze medal

        $bronzeSQL = "SELECT * FROM teams WHERE id = '$teamID[2]'";
        $bronzeQuery = mysqli_query($conn,$bronzeSQL);

        $bronzeResult = mysqli_fetch_assoc($bronzeQuery);

        $bronzeName = $bronzeResult['team_name'];

        $bronzeUpdate = "UPDATE tally SET BRONZE = BRONZE + 1 WHERE event_id = '$event_id' AND team_name = '$bronzeName'";
        mysqli_query($conn,$bronzeUpdate);

        
        $teamID = []; //empty the array
        
        // update status 
        $updateStatus = "UPDATE players SET game = 'Score' WHERE game_id = '$game_id' AND event_id = '$event_id' AND choose_type = 'discus'";
        mysqli_query($conn,$updateStatus);

        header('Location: throws.php?event_id=' . urlencode($event_id) . '&game_id=' . urlencode($game_id) . '&game_type=' . urlencode($game_type) . '&meter=' . urlencode('discus')); 

}else if($meter == 'shotput'){
    $teamID = [];
    $shotputSQL = "SELECT *,
       CASE
           WHEN SET1 >= SET2 AND SET1 >= SET3 THEN SET1
           WHEN SET2 >= SET1 AND SET2 >= SET3 THEN SET2
           ELSE SET3
       END AS highest_set
        FROM players
        WHERE event_id = '$event_id'
        AND game_id = '$game_id'
        AND choose_type = 'shotput'
        ORDER BY highest_set DESC
        ";

    $shotputQuery = mysqli_query($conn,$shotputSQL);
    while($getshotput = mysqli_fetch_assoc($shotputQuery)){
            $teamID[] = $getshotput['team_id'];
    }
    
    // gold medal
    
        $goldSQL = "SELECT * FROM teams WHERE id = '$teamID[0]'";
        $goldQuery = mysqli_query($conn,$goldSQL);

        $goldResult = mysqli_fetch_assoc($goldQuery);

        $goldName = $goldResult['team_name'];

        $goldUpdate = "UPDATE tally SET GOLD = GOLD + 1 WHERE event_id = '$event_id' AND team_name = '$goldName'";
        mysqli_query($conn,$goldUpdate);

    // silver medal

        $silverSQL = "SELECT * FROM teams WHERE id = '$teamID[1]'";
        $silverQuery = mysqli_query($conn,$silverSQL);

        $silverResult = mysqli_fetch_assoc($silverQuery);

        $silverName = $silverResult['team_name'];

        $silverUpdate = "UPDATE tally SET SILVER = SILVER + 1 WHERE event_id = '$event_id' AND team_name = '$silverName'";
        mysqli_query($conn,$silverUpdate);

    // bronze medal

        $bronzeSQL = "SELECT * FROM teams WHERE id = '$teamID[2]'";
        $bronzeQuery = mysqli_query($conn,$bronzeSQL);

        $bronzeResult = mysqli_fetch_assoc($bronzeQuery);

        $bronzeName = $bronzeResult['team_name'];

        $bronzeUpdate = "UPDATE tally SET BRONZE = BRONZE + 1 WHERE event_id = '$event_id' AND team_name = '$bronzeName'";
        mysqli_query($conn,$bronzeUpdate);

        
        $teamID = []; //empty the array
        
        // update status 
        $updateStatus = "UPDATE players SET game = 'Score' WHERE game_id = '$game_id' AND event_id = '$event_id' AND choose_type = 'shotput'";
        mysqli_query($conn,$updateStatus);

        header('Location: throws.php?event_id=' . urlencode($event_id) . '&game_id=' . urlencode($game_id) . '&game_type=' . urlencode($game_type) . '&meter=' . urlencode('shotput')); 
}

?>
