<?php
session_start();
include('../connection/conn.php');


    $event_id = $_GET['event_id'];
    $game_id = $_GET['game_id'];
    $game_type = $_GET['game_type'];
    $meter = $_GET['meter'];


    if($meter == '100meter'){
                $selectAllData = "SELECT * FROM players WHERE game_id = '$game_id' AND event_id = '$event_id' AND choose_type = '100meter' ORDER BY First_Try ASC";
                $queryData = mysqli_query($conn,$selectAllData);

                $value = [];

                while($getValue = mysqli_fetch_assoc($queryData)){
                        $value[] = $getValue['team_id'];
                }

                $teamName = '';

                // gold
                    
                    $gold = "SELECT * FROM teams WHERE id = '$value[0]'";
                    $goldQuery = mysqli_query($conn,$gold);
                    $goldResult = mysqli_fetch_assoc($goldQuery);

                    $teamName = $goldResult['team_name'];
                    
                    $updateGold = "UPDATE tally SET GOLD = GOLD + 1 WHERE event_id = '$event_id' AND team_name = '$teamName'";
                    mysqli_query($conn,$updateGold);
                    $teamName = '';

                // silver

                    $silver = "SELECT * FROM teams WHERE id = '$value[1]'";
                    $silverQuery = mysqli_query($conn,$silver);
                    $silverResult = mysqli_fetch_assoc($silverQuery);

                    $teamName = $silverResult['team_name'];
                    
                    $updatesilver = "UPDATE tally SET SILVER = SILVER + 1 WHERE event_id = '$event_id' AND team_name = '$teamName'";
                    mysqli_query($conn,$updatesilver);
                    $teamName = '';

                // bronze

                    $bronze = "SELECT * FROM teams WHERE id = '$value[2]'";
                    $bronzeQuery = mysqli_query($conn,$bronze);
                    $bronzeResult = mysqli_fetch_assoc($bronzeQuery);

                    $teamName = $bronzeResult['team_name'];
                    
                    $updatebronze = "UPDATE tally SET BRONZE = BRONZE + 1 WHERE event_id = '$event_id' AND team_name = '$teamName'";
                    mysqli_query($conn,$updatebronze);
                    $teamName = '';

            // update status 
                $updateStatus = "UPDATE players SET game = 'Score' WHERE game_id = '$game_id' AND event_id = '$event_id' AND choose_type = '100meter'";
                mysqli_query($conn,$updateStatus);

                header('Location: runs.php?event_id=' . urlencode($event_id) . '&game_id=' . urlencode($game_id) . '&game_type=' . urlencode($game_type) . '&meter=' . urlencode('100meter')); 

    }else if($meter == '200meter'){

        $selectAllData = "SELECT * FROM players WHERE game_id = '$game_id' AND event_id = '$event_id' AND choose_type = '200meter' ORDER BY First_Try ASC";
        $queryData = mysqli_query($conn,$selectAllData);

        $value = [];

        while($getValue = mysqli_fetch_assoc($queryData)){
                $value[] = $getValue['team_id'];
        }

        $teamName = '';

        // gold
            
            $gold = "SELECT * FROM teams WHERE id = '$value[0]'";
            $goldQuery = mysqli_query($conn,$gold);
            $goldResult = mysqli_fetch_assoc($goldQuery);

            $teamName = $goldResult['team_name'];
            
            $updateGold = "UPDATE tally SET GOLD = GOLD + 1 WHERE event_id = '$event_id' AND team_name = '$teamName'";
            mysqli_query($conn,$updateGold);
            $teamName = '';

        // silver

            $silver = "SELECT * FROM teams WHERE id = '$value[1]'";
            $silverQuery = mysqli_query($conn,$silver);
            $silverResult = mysqli_fetch_assoc($silverQuery);

            $teamName = $silverResult['team_name'];
            
            $updatesilver = "UPDATE tally SET SILVER = SILVER + 1 WHERE event_id = '$event_id' AND team_name = '$teamName'";
            mysqli_query($conn,$updatesilver);
            $teamName = '';

        // bronze

            $bronze = "SELECT * FROM teams WHERE id = '$value[2]'";
            $bronzeQuery = mysqli_query($conn,$bronze);
            $bronzeResult = mysqli_fetch_assoc($bronzeQuery);

            $teamName = $bronzeResult['team_name'];
            
            $updatebronze = "UPDATE tally SET BRONZE = BRONZE + 1 WHERE event_id = '$event_id' AND team_name = '$teamName'";
            mysqli_query($conn,$updatebronze);
            $teamName = '';

    // update status 
        $updateStatus = "UPDATE players SET game = 'Score' WHERE game_id = '$game_id' AND event_id = '$event_id' AND choose_type = '200meter'";
        mysqli_query($conn,$updateStatus);

        header('Location: runs.php?event_id=' . urlencode($event_id) . '&game_id=' . urlencode($game_id) . '&game_type=' . urlencode($game_type) . '&meter=' . urlencode('200meter')); 

    }else if($meter == '400meter'){

        $selectAllData = "SELECT * FROM players WHERE game_id = '$game_id' AND event_id = '$event_id' AND choose_type = '400meter' ORDER BY First_Try ASC";
        $queryData = mysqli_query($conn,$selectAllData);

        $value = [];

        while($getValue = mysqli_fetch_assoc($queryData)){
                $value[] = $getValue['team_id'];
        }

        $teamName = '';

        // gold
            
            $gold = "SELECT * FROM teams WHERE id = '$value[0]'";
            $goldQuery = mysqli_query($conn,$gold);
            $goldResult = mysqli_fetch_assoc($goldQuery);

            $teamName = $goldResult['team_name'];
            
            $updateGold = "UPDATE tally SET GOLD = GOLD + 5 WHERE event_id = '$event_id' AND team_name = '$teamName'";
            mysqli_query($conn,$updateGold);
            $teamName = '';

        // silver

            $silver = "SELECT * FROM teams WHERE id = '$value[4]'";
            $silverQuery = mysqli_query($conn,$silver);
            $silverResult = mysqli_fetch_assoc($silverQuery);

            $teamName = $silverResult['team_name'];
            
            $updatesilver = "UPDATE tally SET SILVER = SILVER + 5 WHERE event_id = '$event_id' AND team_name = '$teamName'";
            mysqli_query($conn,$updatesilver);
            $teamName = '';

        // bronze

            $bronze = "SELECT * FROM teams WHERE id = '$value[8]'";
            $bronzeQuery = mysqli_query($conn,$bronze);
            $bronzeResult = mysqli_fetch_assoc($bronzeQuery);

            $teamName = $bronzeResult['team_name'];
            
            $updatebronze = "UPDATE tally SET BRONZE = BRONZE + 5 WHERE event_id = '$event_id' AND team_name = '$teamName'";
            mysqli_query($conn,$updatebronze);
            $teamName = '';

    // update status 
        $updateStatus = "UPDATE players SET game = 'Score' WHERE game_id = '$game_id' AND event_id = '$event_id' AND choose_type = '400meter'";
        mysqli_query($conn,$updateStatus);

        header('Location: runs.php?event_id=' . urlencode($event_id) . '&game_id=' . urlencode($game_id) . '&game_type=' . urlencode($game_type) . '&meter=' . urlencode('400meter')); 

    }

    




?>