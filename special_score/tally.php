<?php
 session_start();
 include('../connection/conn.php');

        $event_id =  $_GET['event_id'];
        $game_id =  $_GET['game_id'];
        $game_type = $_GET['game_type'];


            if($game_type == 'Mass_Dance'){
                $team_name = [];

                $selectAllScores = " SELECT *, 
                   (A + B + C + D) AS total_score
                    FROM teams
                    WHERE game_id = '$game_id' 
                    AND event_id = '$event_id'
                    ORDER BY total_score DESC";
        
                $queryAllScores = mysqli_query($conn,$selectAllScores);
                while($getAllData  = mysqli_fetch_assoc($queryAllScores)){
                        $team_name[] = $getAllData['team_name'];
                }
        
                $goldTeam = $team_name[0];
                $silverTeam = $team_name[1];
                $bronzeTeam = $team_name[2];
        
                // gold
                    $updateGold = "UPDATE tally SET GOLD = GOLD + 5 WHERE event_id = $event_id AND team_name = '$goldTeam'";
                    mysqli_query($conn,$updateGold);

                  // silver
                  $updateSilver = "UPDATE tally SET SILVER = SILVER + 5 WHERE event_id = $event_id AND team_name = '$silverTeam'";
                  mysqli_query($conn,$updateSilver);

                // bronze
                $updateBronze = "UPDATE tally SET BRONZE = BRONZE + 5 WHERE event_id = $event_id AND team_name = '$bronzeTeam'";
                mysqli_query($conn,$updateBronze);


                // update
                $updateStatus = "UPDATE teams SET game = 'Score' WHERE game_id = '$game_id' AND event_id = '$event_id'";
                mysqli_query($conn,$updateStatus);

                // clear 
                $team_name = [];

                header('Location: special_performance.php?event_id=' . urlencode($event_id) . '&game_id=' . urlencode($game_id) . '&game_type=' . urlencode($game_type));       
            }else if($game_type == 'Dance_Sports'){
                $team_name = [];

                $selectAllScores = " SELECT *, 
                   (A + B + C + D + E + F) AS total_score
                    FROM teams
                    WHERE game_id = '$game_id' 
                    AND event_id = '$event_id'
                    ORDER BY total_score DESC";
        
                $queryAllScores = mysqli_query($conn,$selectAllScores);
                while($getAllData  = mysqli_fetch_assoc($queryAllScores)){
                        $team_name[] = $getAllData['team_name'];
                }
        
                $goldTeam = $team_name[0];
                $silverTeam = $team_name[1];
                $bronzeTeam = $team_name[2];
        
                // gold
                    $updateGold = "UPDATE tally SET GOLD = GOLD + 2 WHERE event_id = $event_id AND team_name = '$goldTeam'";
                    mysqli_query($conn,$updateGold);

                  // silver
                  $updateSilver = "UPDATE tally SET SILVER = SILVER + 2 WHERE event_id = $event_id AND team_name = '$silverTeam'";
                  mysqli_query($conn,$updateSilver);

                // bronze
                $updateBronze = "UPDATE tally SET BRONZE = BRONZE + 2 WHERE event_id = $event_id AND team_name = '$bronzeTeam'";
                mysqli_query($conn,$updateBronze);


                // update
                $updateStatus = "UPDATE teams SET game = 'Score' WHERE game_id = '$game_id' AND event_id = '$event_id'";
                mysqli_query($conn,$updateStatus);

                // clear 
                $team_name = [];

                header('Location: special_performance.php?event_id=' . urlencode($event_id) . '&game_id=' . urlencode($game_id) . '&game_type=' . urlencode($game_type));     
            }else if($game_type == 'Mr_and_Mrs_Panagtigi'){
                $team_name = [];

                $selectAllScores = " SELECT *, 
                   (A + B + C + D) AS total_score
                    FROM teams
                    WHERE game_id = '$game_id' 
                    AND event_id = '$event_id'
                    ORDER BY total_score DESC";
        
                $queryAllScores = mysqli_query($conn,$selectAllScores);
                while($getAllData  = mysqli_fetch_assoc($queryAllScores)){
                        $team_name[] = $getAllData['team_name'];
                }
        
                $goldTeam = $team_name[0];
                $silverTeam = $team_name[1];
                $bronzeTeam = $team_name[2];
        
                // gold
                    $updateGold = "UPDATE tally SET GOLD = GOLD + 5 WHERE event_id = $event_id AND team_name = '$goldTeam'";
                    mysqli_query($conn,$updateGold);

                  // silver
                  $updateSilver = "UPDATE tally SET SILVER = SILVER + 5 WHERE event_id = $event_id AND team_name = '$silverTeam'";
                  mysqli_query($conn,$updateSilver);    

                // bronze
                $updateBronze = "UPDATE tally SET BRONZE = BRONZE + 5 WHERE event_id = $event_id AND team_name = '$bronzeTeam'";
                mysqli_query($conn,$updateBronze);


                // update
                $updateStatus = "UPDATE teams SET game = 'Score' WHERE game_id = '$game_id' AND event_id = '$event_id'";
                mysqli_query($conn,$updateStatus);

                // clear 
                $team_name = [];

                header('Location: special_performance.php?event_id=' . urlencode($event_id) . '&game_id=' . urlencode($game_id) . '&game_type=' . urlencode($game_type));     
            }

      
?>