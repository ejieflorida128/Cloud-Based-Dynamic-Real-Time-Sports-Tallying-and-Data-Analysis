<?php
session_start();
include('../connection/conn.php');

$event_id = $_GET['event_id'];
$game_id = $_GET['game_id'];
$game_type = $_GET['game_type'];
$meter = $_GET['meter'];

if($meter == 'long') {
    $teamID = [];
    $longSQL = "SELECT *,
       CASE
           WHEN SET1 >= SET2 AND SET1 >= SET3 THEN SET1
           WHEN SET2 >= SET1 AND SET2 >= SET3 THEN SET2
           ELSE SET3
       END AS highest_set
        FROM players
        WHERE event_id = '$event_id'
        AND game_id = '$game_id'
        AND choose_type = 'long'
        ORDER BY highest_set DESC
        ";

    $longQuery = mysqli_query($conn,$longSQL);
    while($getlong = mysqli_fetch_assoc($longQuery)){
            $teamID[] = $getlong['team_id'];
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
        $updateStatus = "UPDATE players SET game = 'Score' WHERE game_id = '$game_id' AND event_id = '$event_id' AND choose_type = 'long'";
        mysqli_query($conn,$updateStatus);

        header('Location: jumps.php?event_id=' . urlencode($event_id) . '&game_id=' . urlencode($game_id) . '&game_type=' . urlencode($game_type) . '&meter=' . urlencode('long')); 

   
}else if($meter == 'high'){

    $teamID = [];
    $highSQL = "SELECT *,
       CASE
           WHEN SET1 >= SET2 AND SET1 >= SET3 THEN SET1
           WHEN SET2 >= SET1 AND SET2 >= SET3 THEN SET2
           ELSE SET3
       END AS highest_set
        FROM players
        WHERE event_id = '$event_id'
        AND game_id = '$game_id'
        AND choose_type = 'high'
        ORDER BY highest_set DESC
        ";

    $highQuery = mysqli_query($conn,$highSQL);
    while($gethigh = mysqli_fetch_assoc($highQuery)){
            $teamID[] = $gethigh['team_id'];
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
        $updateStatus = "UPDATE players SET game = 'Score' WHERE game_id = '$game_id' AND event_id = '$event_id' AND choose_type = 'high'";
        mysqli_query($conn,$updateStatus);

        header('Location: jumps.php?event_id=' . urlencode($event_id) . '&game_id=' . urlencode($game_id) . '&game_type=' . urlencode($game_type) . '&meter=' . urlencode('high')); 

}else if($meter == 'triple'){
    $teamID = [];
    $tripleSQL = "SELECT *,
       CASE
           WHEN SET1 >= SET2 AND SET1 >= SET3 THEN SET1
           WHEN SET2 >= SET1 AND SET2 >= SET3 THEN SET2
           ELSE SET3
       END AS highest_set
        FROM players
        WHERE event_id = '$event_id'
        AND game_id = '$game_id'
        AND choose_type = 'triple'
        ORDER BY highest_set DESC
        ";

    $tripleQuery = mysqli_query($conn,$tripleSQL);
    while($gettriple = mysqli_fetch_assoc($tripleQuery)){
            $teamID[] = $gettriple['team_id'];
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
        $updateStatus = "UPDATE players SET game = 'Score' WHERE game_id = '$game_id' AND event_id = '$event_id' AND choose_type = 'triple'";
        mysqli_query($conn,$updateStatus);

        header('Location: jumps.php?event_id=' . urlencode($event_id) . '&game_id=' . urlencode($game_id) . '&game_type=' . urlencode($game_type) . '&meter=' . urlencode('triple')); 
}

?>
