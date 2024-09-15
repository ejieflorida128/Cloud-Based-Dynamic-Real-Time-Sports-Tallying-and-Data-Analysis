<?php

session_start();
include('../connection/conn.php');
// include('changeStatusFunctions.php');

$game_id = $_SESSION['GameId'];
$event_id = $_SESSION['EventId'];
$gameType = $_SESSION['GameType'];
$team_count = $_SESSION['teamCount'];
$EliType = $_SESSION['EliminationType'];


    // Update ang status sa laro to 'submitted'
            $update = "UPDATE registered_game SET status = 'submitted' WHERE id = $game_id";
            if (mysqli_query($conn, $update)) {
                error_log("Game status updated successfully.");
            } else {
                error_log("Error updating game status: " . mysqli_error($conn));
            }

            // Tawga ang function base sa game type
            if ($gameType == 'Basketball_Men' || $gameType == 'Basketball_Women' || $gameType == 'Vollayball_Men' || $gameType == 'Vollayball_Women' || $gameType == 'Softball_Men' || $gameType == 'Softball_Women' || $gameType == 'MLBB' || $gameType == 'Futsal_Men' || $gameType == 'Futsal_Women') {
                // Sugdi ang double elimination match generation process
               
                if($EliType == 'SEG'){
                      getSingleEliminationMatches($team_count, $game_id, $event_id, $gameType, $conn);
                }else if($EliType == 'DEG'){
                      getDoubleEliminationMatches($team_count, $game_id, $event_id, $gameType, $conn);
                }else if($EliType == 'SRRG'){
                    // Round Robin
                    generateRoundRobinMatches($team_count,$game_id,$event_id,$gameType,$conn);

                }else if($EliType == 'MSEG'){
                    getModifiedSingleEliminationMatches($team_count, $game_id, $event_id, $gameType, $conn);
                }
            } else if($gameType == 'Badminton_Men' || $gameType == 'Badminton_Women' || $gameType == 'Table_tennis_Men' || $gameType == 'Table_tennis_Women' || $gameType == 'Chess' || $gameType == 'Archery'){
                // handle games like sa mga teams with player ang style like table tennis and badmnton 
                if($EliType == 'SEG'){
                    /*
                    getSingleEliminationMatchesWithSingleAndDoubleCategory ($team_count, $game_id, $event_id, $gameType, $conn);

                        // need construction of this code { error } we will just use the temporary

                    */

                    generateMatchesBadmintonandTableTennisModified($conn,$event_id,$game_id,$gameType);

                    

                }else if($EliType == 'DEG'){
                     /*
                    getDoubleEliminationMatchesWithSingleAndDoubleCategory($team_count, $game_id, $event_id, $gameType, $conn);

                    // need construction of this code { error } we will just use the temporary

                    */

                    generateMatchesBadmintonandTableTennisModifiedDouble($conn,$event_id,$game_id,$gameType);


                }else if($EliType == 'MSEG'){
                    
                    generateMatchesBadmintonandTableTennisModifiedMMM($conn,$event_id,$game_id,$gameType);
                        
                }
                
            }

            header('Location: ../addGames.php?id=' . urlencode($event_id) . '&teamCount=' . urlencode($team_count));  // Redirect sa addGames page with event_id ug team_count parameters
            exit();  // Exit the script


            // function for badminton and table tennis for double elimination
            function generateMatchesBadmintonandTableTennisModified($conn,$event_id,$game_id,$game_type){  

                $player =  4; 
                $matches =  $player - 1; //for single elimination matches 
                    

                if($game_type == 'Chess' || $game_type == 'Archery'){
                    for ($x = 1; $x <= $matches; $x++){

                        $insertNewMatchesForBadmintonAndTTennis = "INSERT INTO game_matches (game_id,event_id,game_type,match_info,EliType) VALUES ('$game_id','$event_id','$game_type','$x','SEG')";
                        mysqli_query($conn,$insertNewMatchesForBadmintonAndTTennis);

                    }
                }else{
                    for ($x = 1; $x <= $matches; $x++){

                        $insertNewMatchesForBadmintonAndTTennis = "INSERT INTO game_matches (game_id,event_id,game_type,match_info,type,EliType) VALUES ('$game_id','$event_id','$game_type','$x','single','SEG')";
                        mysqli_query($conn,$insertNewMatchesForBadmintonAndTTennis);

                    }

                    for ($y = 1; $y <= $matches; $y++){

                        $insertNewMatchesForBadmintonAndTTennis = "INSERT INTO game_matches (game_id,event_id,game_type,match_info,type,EliType) VALUES ('$game_id','$event_id','$game_type','$y','double','SEG')";
                        mysqli_query($conn,$insertNewMatchesForBadmintonAndTTennis);

                    }
                }
                    
                   

                    updateDataForBadmintonAndTableTennisModified($conn,$event_id,$game_id,$game_type);



            }

            // function for badminton and table tennis for single elimination
            function generateMatchesBadmintonandTableTennisModifiedDouble($conn,$event_id,$game_id,$game_type){  

                $player =  4; 
                $matches = 2 * ($player - 1); //for double elimination matches 

                if($game_type == 'Chess' || $game_type == 'Archery'){
                    for ($x = 1; $x <= $matches; $x++){

                        $insertNewMatchesForBadmintonAndTTennis = "INSERT INTO game_matches (game_id,event_id,game_type,match_info,EliType) VALUES ('$game_id','$event_id','$game_type','$x','DEG')";
                        mysqli_query($conn,$insertNewMatchesForBadmintonAndTTennis);

                    }
                }else{
                    for ($x = 1; $x <= $matches; $x++){

                        $insertNewMatchesForBadmintonAndTTennis = "INSERT INTO game_matches (game_id,event_id,game_type,match_info,type,EliType) VALUES ('$game_id','$event_id','$game_type','$x','single','DEG')";
                        mysqli_query($conn,$insertNewMatchesForBadmintonAndTTennis);

                    }

                    for ($y = 1; $y <= $matches; $y++){

                        $insertNewMatchesForBadmintonAndTTennis = "INSERT INTO game_matches (game_id,event_id,game_type,match_info,type,EliType) VALUES ('$game_id','$event_id','$game_type','$y','double','DEG')";
                        mysqli_query($conn,$insertNewMatchesForBadmintonAndTTennis);

                    }
                }
                   

                    updateDataForBadmintonAndTableTennisModifiedDouble($conn,$event_id,$game_id,$game_type);



            }

            

             // function for badminton and table tennis for MODIFIED elimination
             function generateMatchesBadmintonandTableTennisModifiedMMM($conn,$event_id,$game_id,$game_type){  

           
                $matches = 4; //for MODIFIED LADDER TYPE

                if($game_type == 'Archery'){
                    for ($x = 1; $x <= $matches; $x++){

                        $insertNewMatchesForBadmintonAndTTennis = "INSERT INTO game_matches (game_id,event_id,game_type,match_info,EliType) VALUES ('$game_id','$event_id','$game_type','$x','MSEG')";
                        mysqli_query($conn,$insertNewMatchesForBadmintonAndTTennis);

                    }
                }else if($game_type == 'Chess'){
                    for ($x = 1; $x <= 16; $x++){

                        $insertNewMatchesForBadmintonAndTTennis = "INSERT INTO game_matches (game_id,event_id,game_type,match_info,EliType) VALUES ('$game_id','$event_id','$game_type','$x','MSEG')";
                        mysqli_query($conn,$insertNewMatchesForBadmintonAndTTennis);

                    }
                }else{
                    for ($x = 1; $x <= $matches; $x++){

                        $insertNewMatchesForBadmintonAndTTennis = "INSERT INTO game_matches (game_id,event_id,game_type,match_info,type,EliType) VALUES ('$game_id','$event_id','$game_type','$x','single','MSEG')";
                        mysqli_query($conn,$insertNewMatchesForBadmintonAndTTennis);

                    }

                    for ($y = 1; $y <= $matches; $y++){

                        $insertNewMatchesForBadmintonAndTTennis = "INSERT INTO game_matches (game_id,event_id,game_type,match_info,type,EliType) VALUES ('$game_id','$event_id','$game_type','$y','double','MSEG')";
                        mysqli_query($conn,$insertNewMatchesForBadmintonAndTTennis);

                    }
                }
                   

                    updateDataForBadmintonAndTableTennisModifiedMMM($conn,$event_id,$game_id,$game_type);



            }


            function updateDataForBadmintonAndTableTennisModified($conn, $event_id, $game_id,$game_type) {

                if($game_type == 'Chess' || $game_type == 'Archery'){
                    $playerName1 = [];
                    $playerId1 = [];

                     // Get data for player1
                     $getAllData = "SELECT * FROM players WHERE game_id = $game_id AND event_id = $event_id AND player_number = 'player1'";
                     $result1 = mysqli_query($conn, $getAllData);
                     while ($get1 = mysqli_fetch_assoc($result1)) {
                         $playerName1[] = $get1['name'];
                         $playerId1[] = $get1['id'];
                     }

                     $updateSingle1 = "UPDATE game_matches SET status = 'game', round = 1, team1 = '{$playerId1[0]}', team1_name = '{$playerName1[0]}', team2 = '{$playerId1[1]}', team2_name = '{$playerName1[1]}' WHERE event_id = '$event_id' AND game_id = '$game_id' AND match_info = 1";
                     mysqli_query($conn, $updateSingle1);
                 
                     $updateSingle2 = "UPDATE game_matches SET status = 'game', round = 1, team1 = '{$playerId1[2]}', team1_name = '{$playerName1[2]}', team2 = '{$playerId1[3]}', team2_name = '{$playerName1[3]}' WHERE event_id = '$event_id' AND game_id = '$game_id' AND match_info = 2";
                     mysqli_query($conn, $updateSingle2);

                     $playerName1 = [];
                     $playerId1 = [];


                }else{
                    $playerName1 = [];
                    $playerId1 = [];
                    
                    $playerName2_1 = [];
                    $playerId2_1 = [];
                    $playerName2_2 = [];
                    $playerId2_2 = [];
                    
                    // Get data for player1
                    $getAllData = "SELECT * FROM players WHERE game_id = $game_id AND event_id = $event_id AND player_number = 'player1'";
                    $result1 = mysqli_query($conn, $getAllData);
                    while ($get1 = mysqli_fetch_assoc($result1)) {
                        $playerName1[] = $get1['name'];
                        $playerId1[] = $get1['id'];
                    }
                
                    // Get data for player2
                    $getAllData1 = "SELECT * FROM players WHERE game_id = $game_id AND event_id = $event_id AND player_number = 'player2'";
                    $result2 = mysqli_query($conn, $getAllData1);
                    while ($get2 = mysqli_fetch_assoc($result2)) {
                        $playerName2_1[] = $get2['name']; // Assuming player2's name
                        $playerId2_1[] = $get2['id']; // Assuming player2's ID
                
                        // Assuming you meant to fetch additional teammates or other players' names and IDs here:
                        $playerName2_2[] = $get2['name1']; // Adjust this based on actual field
                        $playerId2_2[] = $get2['id']; // Adjust this based on actual field
                    }
                
                    // Update single matches
                    $updateSingle1 = "UPDATE game_matches SET status = 'game', round = 1, team1 = '{$playerId1[0]}', team1_name = '{$playerName1[0]}', team2 = '{$playerId1[1]}', team2_name = '{$playerName1[1]}' WHERE event_id = '$event_id' AND game_id = '$game_id' AND match_info = 1 AND type = 'single'";
                    mysqli_query($conn, $updateSingle1);
                
                    $updateSingle2 = "UPDATE game_matches SET status = 'game', round = 1, team1 = '{$playerId1[2]}', team1_name = '{$playerName1[2]}', team2 = '{$playerId1[3]}', team2_name = '{$playerName1[3]}' WHERE event_id = '$event_id' AND game_id = '$game_id' AND match_info = 2 AND type = 'single'";
                    mysqli_query($conn, $updateSingle2);
                
                    // Update double matches
                    $updateDouble1 = "UPDATE game_matches SET status = 'game', round = 1, team1 = '{$playerId2_1[0]}', team1_name = '{$playerName2_1[0]}', team1_1 = '{$playerId2_2[0]}', team1_name1 = '{$playerName2_2[0]}', team2 = '{$playerId2_1[1]}', team2_name = '{$playerName2_1[1]}', team2_2 = '{$playerId2_2[1]}', team2_name2 = '{$playerName2_2[1]}' WHERE event_id = '$event_id' AND game_id = '$game_id' AND match_info = 1 AND type = 'double'";
                    mysqli_query($conn, $updateDouble1);
                
                    $updateDouble2 = "UPDATE game_matches SET status = 'game', round = 1, team1 = '{$playerId2_1[2]}', team1_name = '{$playerName2_1[2]}', team1_1 = '{$playerId2_2[2]}', team1_name1 = '{$playerName2_2[2]}', team2 = '{$playerId2_1[3]}', team2_name = '{$playerName2_1[3]}', team2_2 = '{$playerId2_2[3]}', team2_name2 = '{$playerName2_2[3]}' WHERE event_id = '$event_id' AND game_id = '$game_id' AND match_info = 2 AND type = 'double'";
                    mysqli_query($conn, $updateDouble2);
    
                    $playerName1 = [];
                    $playerId1 = [];
                    
                    $playerName2_1 = [];
                    $playerId2_1 = [];
                    $playerName2_2 = [];
                    $playerId2_2 = [];
                }

              
            }



            function updateDataForBadmintonAndTableTennisModifiedDouble($conn, $event_id, $game_id,$game_type) {

                if($game_type == 'Chess' || $game_type == 'Archery'){
                    $playerName1 = [];
                    $playerId1 = [];

                     // Get data for player1
                     $getAllData = "SELECT * FROM players WHERE game_id = $game_id AND event_id = $event_id AND player_number = 'player1'";
                     $result1 = mysqli_query($conn, $getAllData);
                     while ($get1 = mysqli_fetch_assoc($result1)) {
                         $playerName1[] = $get1['name'];
                         $playerId1[] = $get1['id'];
                     }

                     $updateSingle1 = "UPDATE game_matches SET status = 'game', round = 1, team1 = '{$playerId1[0]}', team1_name = '{$playerName1[0]}', team2 = '{$playerId1[1]}', team2_name = '{$playerName1[1]}' WHERE event_id = '$event_id' AND game_id = '$game_id' AND match_info = 1";
                     mysqli_query($conn, $updateSingle1);
                 
                     $updateSingle2 = "UPDATE game_matches SET status = 'game', round = 1, team1 = '{$playerId1[2]}', team1_name = '{$playerName1[2]}', team2 = '{$playerId1[3]}', team2_name = '{$playerName1[3]}' WHERE event_id = '$event_id' AND game_id = '$game_id' AND match_info = 2";
                     mysqli_query($conn, $updateSingle2);

                     $playerName1 = [];
                     $playerId1 = [];


                }else{
                    $playerName1 = [];
                    $playerId1 = [];
                    
                    $playerName2_1 = [];
                    $playerId2_1 = [];
                    $playerName2_2 = [];
                    $playerId2_2 = [];
                    
                    // Get data for player1
                    $getAllData = "SELECT * FROM players WHERE game_id = $game_id AND event_id = $event_id AND player_number = 'player1'";
                    $result1 = mysqli_query($conn, $getAllData);
                    while ($get1 = mysqli_fetch_assoc($result1)) {
                        $playerName1[] = $get1['name'];
                        $playerId1[] = $get1['id'];
                    }
                
                    // Get data for player2
                    $getAllData1 = "SELECT * FROM players WHERE game_id = $game_id AND event_id = $event_id AND player_number = 'player2'";
                    $result2 = mysqli_query($conn, $getAllData1);
                    while ($get2 = mysqli_fetch_assoc($result2)) {
                        $playerName2_1[] = $get2['name']; // Assuming player2's name
                        $playerId2_1[] = $get2['id']; // Assuming player2's ID
                
                        // Assuming you meant to fetch additional teammates or other players' names and IDs here:
                        $playerName2_2[] = $get2['name1']; // Adjust this based on actual field
                        $playerId2_2[] = $get2['id']; // Adjust this based on actual field
                    }
                
                    // Update single matches
                    $updateSingle1 = "UPDATE game_matches SET status = 'game', round = 1, team1 = '{$playerId1[0]}', team1_name = '{$playerName1[0]}', team2 = '{$playerId1[1]}', team2_name = '{$playerName1[1]}' WHERE event_id = '$event_id' AND game_id = '$game_id' AND match_info = 1 AND type = 'single'";
                    mysqli_query($conn, $updateSingle1);
                
                    $updateSingle2 = "UPDATE game_matches SET status = 'game', round = 1, team1 = '{$playerId1[2]}', team1_name = '{$playerName1[2]}', team2 = '{$playerId1[3]}', team2_name = '{$playerName1[3]}' WHERE event_id = '$event_id' AND game_id = '$game_id' AND match_info = 2 AND type = 'single'";
                    mysqli_query($conn, $updateSingle2);
                
                    // Update double matches
                    $updateDouble1 = "UPDATE game_matches SET status = 'game', round = 1, team1 = '{$playerId2_1[0]}', team1_name = '{$playerName2_1[0]}', team1_1 = '{$playerId2_2[0]}', team1_name1 = '{$playerName2_2[0]}', team2 = '{$playerId2_1[1]}', team2_name = '{$playerName2_1[1]}', team2_2 = '{$playerId2_2[1]}', team2_name2 = '{$playerName2_2[1]}' WHERE event_id = '$event_id' AND game_id = '$game_id' AND match_info = 1 AND type = 'double'";
                    mysqli_query($conn, $updateDouble1);
                
                    $updateDouble2 = "UPDATE game_matches SET status = 'game', round = 1, team1 = '{$playerId2_1[2]}', team1_name = '{$playerName2_1[2]}', team1_1 = '{$playerId2_2[2]}', team1_name1 = '{$playerName2_2[2]}', team2 = '{$playerId2_1[3]}', team2_name = '{$playerName2_1[3]}', team2_2 = '{$playerId2_2[3]}', team2_name2 = '{$playerName2_2[3]}' WHERE event_id = '$event_id' AND game_id = '$game_id' AND match_info = 2 AND type = 'double'";
                    mysqli_query($conn, $updateDouble2);
    
                    $playerName1 = [];
                    $playerId1 = [];
                    
                    $playerName2_1 = [];
                    $playerId2_1 = [];
                    $playerName2_2 = [];
                    $playerId2_2 = [];
                }
              
            }



            // MODIFIED FOR Mdeg

            function updateDataForBadmintonAndTableTennisModifiedMMM($conn, $event_id, $game_id,$game_type) {

                if($game_type == 'Archery'){
                    $playerName1 = [];
                    $playerId1 = [];

                     // Get data for player1
                     $getAllData = "SELECT * FROM players WHERE game_id = $game_id AND event_id = $event_id AND player_number = 'player1' ORDER BY RAND()";
                     $result1 = mysqli_query($conn, $getAllData);
                     while ($get1 = mysqli_fetch_assoc($result1)) {
                         $playerName1[] = $get1['name'];
                         $playerId1[] = $get1['id'];
                     }

                     $updateSingle1 = "UPDATE game_matches SET status = 'game', round = 1, team1 = '{$playerId1[0]}', team1_name = '{$playerName1[0]}', team2 = '{$playerId1[1]}', team2_name = '{$playerName1[1]}' WHERE event_id = '$event_id' AND game_id = '$game_id' AND match_info = 1";
                     mysqli_query($conn, $updateSingle1);
                 
                     $updateSingle2 = "UPDATE game_matches SET status = 'game', round = 1, team1 = '{$playerId1[2]}', team1_name = '{$playerName1[2]}', team2 = '{$playerId1[3]}', team2_name = '{$playerName1[3]}' WHERE event_id = '$event_id' AND game_id = '$game_id' AND match_info = 2";
                     mysqli_query($conn, $updateSingle2);

                     $playerName1 = [];
                     $playerId1 = [];


                }else if($game_type == 'Chess'){
                    $playerName1 = [];
                    $playerId1 = [];
                    $playerName2 = [];
                    $playerId2 = [];
                    $playerName3 = [];
                    $playerId3 = [];
                    $playerName4 = [];
                    $playerId4 = [];

                     // Get data for player1
                     $getAllData = "SELECT * FROM players WHERE game_id = $game_id AND event_id = $event_id AND player_number = 'player1' ORDER BY RAND()";
                     $result1 = mysqli_query($conn, $getAllData);
                     while ($get1 = mysqli_fetch_assoc($result1)) {
                         $playerName1[] = $get1['name'];
                         $playerId1[] = $get1['id'];
                     }
                     
                      // Get data for player2
                      $getAllData2 = "SELECT * FROM players WHERE game_id = $game_id AND event_id = $event_id AND player_number = 'player2' ORDER BY RAND()";
                      $result2 = mysqli_query($conn, $getAllData2);
                      while ($get2 = mysqli_fetch_assoc($result2)) {
                          $playerName2[] = $get2['name'];
                          $playerId2[] = $get2['id'];
                      }

                       // Get data for player3
                       $getAllData3 = "SELECT * FROM players WHERE game_id = $game_id AND event_id = $event_id AND player_number = 'player3' ORDER BY RAND()";
                       $result3 = mysqli_query($conn, $getAllData3);
                       while ($get3 = mysqli_fetch_assoc($result3)) {
                           $playerName3[] = $get3['name'];
                           $playerId3[] = $get3['id'];
                       }

                       // Get data for player4
                       $getAllData4 = "SELECT * FROM players WHERE game_id = $game_id AND event_id = $event_id AND player_number = 'player4' ORDER BY RAND()";
                       $result4 = mysqli_query($conn, $getAllData4);
                       while ($get4 = mysqli_fetch_assoc($result4)) {
                           $playerName4[] = $get4['name'];
                           $playerId4[] = $get4['id'];
                       }



                     $updateSingle1 = "UPDATE game_matches SET status = 'game', round = 1, team1 = '{$playerId1[2]}', team1_name = '{$playerName1[2]}', team2 = '{$playerId1[0]}', team2_name = '{$playerName1[0]}' WHERE event_id = '$event_id' AND game_id = '$game_id' AND match_info = 1";
                     mysqli_query($conn, $updateSingle1);
                 
                     $updateSingle2 = "UPDATE game_matches SET status = 'game', round = 1, team1 = '{$playerId1[3]}', team1_name = '{$playerName1[3]}', team2 = '{$playerId1[1]}', team2_name = '{$playerName1[1]}' WHERE event_id = '$event_id' AND game_id = '$game_id' AND match_info = 2";
                     mysqli_query($conn, $updateSingle2);

                     $updateSingle3 = "UPDATE game_matches SET status = 'game', round = 1, team1 = '{$playerId2[0]}', team1_name = '{$playerName2[0]}', team2 = '{$playerId2[3]}', team2_name = '{$playerName2[3]}' WHERE event_id = '$event_id' AND game_id = '$game_id' AND match_info = 3";
                     mysqli_query($conn, $updateSingle3);
                 
                     $updateSingle4 = "UPDATE game_matches SET status = 'game', round = 1, team1 = '{$playerId2[2]}', team1_name = '{$playerName2[2]}', team2 = '{$playerId2[1]}', team2_name = '{$playerName2[1]}' WHERE event_id = '$event_id' AND game_id = '$game_id' AND match_info = 4";
                     mysqli_query($conn, $updateSingle4);

                     $updateSingle5 = "UPDATE game_matches SET status = 'game', round = 1, team1 = '{$playerId3[0]}', team1_name = '{$playerName3[0]}', team2 = '{$playerId3[1]}', team2_name = '{$playerName3[1]}' WHERE event_id = '$event_id' AND game_id = '$game_id' AND match_info = 5";
                     mysqli_query($conn, $updateSingle5);
                 
                     $updateSingle6 = "UPDATE game_matches SET status = 'game', round = 1, team1 = '{$playerId3[2]}', team1_name = '{$playerName3[2]}', team2 = '{$playerId3[3]}', team2_name = '{$playerName3[3]}' WHERE event_id = '$event_id' AND game_id = '$game_id' AND match_info = 6";
                     mysqli_query($conn, $updateSingle6);
                     
                     $updateSingle7 = "UPDATE game_matches SET status = 'game', round = 1, team1 = '{$playerId4[2]}', team1_name = '{$playerName4[2]}', team2 = '{$playerId4[0]}', team2_name = '{$playerName4[0]}' WHERE event_id = '$event_id' AND game_id = '$game_id' AND match_info = 7";
                     mysqli_query($conn, $updateSingle7);
                 
                     $updateSingle8 = "UPDATE game_matches SET status = 'game', round = 1, team1 = '{$playerId4[3]}', team1_name = '{$playerName4[3]}', team2 = '{$playerId4[1]}', team2_name = '{$playerName4[1]}' WHERE event_id = '$event_id' AND game_id = '$game_id' AND match_info = 8";
                     mysqli_query($conn, $updateSingle8);

                     $playerName1 = [];
                     $playerId1 = [];
                     $playerName1 = [];
                    $playerId1 = [];
                    $playerName2 = [];
                    $playerId2 = [];
                    $playerName3 = [];
                    $playerId3 = [];
                    $playerName4 = [];
                    $playerId4 = [];

                }else{
                    $playerName1 = [];
                    $playerId1 = [];
                    
                    $playerName2_1 = [];
                    $playerId2_1 = [];
                    $playerName2_2 = [];
                    $playerId2_2 = [];
                    
                    // Get data for player1
                    $getAllData = "SELECT * FROM players WHERE game_id = $game_id AND event_id = $event_id AND player_number = 'player1' ORDER BY RAND()";
                    $result1 = mysqli_query($conn, $getAllData);
                    while ($get1 = mysqli_fetch_assoc($result1)) {
                        $playerName1[] = $get1['name'];
                        $playerId1[] = $get1['id'];
                    }
                
                    // Get data for player2
                    $getAllData1 = "SELECT * FROM players WHERE game_id = $game_id AND event_id = $event_id AND player_number = 'player2' ORDER BY RAND()";
                    $result2 = mysqli_query($conn, $getAllData1);
                    while ($get2 = mysqli_fetch_assoc($result2)) {
                        $playerName2_1[] = $get2['name']; // Assuming player2's name
                        $playerId2_1[] = $get2['id']; // Assuming player2's ID
                
                        // Assuming you meant to fetch additional teammates or other players' names and IDs here:
                        $playerName2_2[] = $get2['name1']; // Adjust this based on actual field
                        $playerId2_2[] = $get2['id']; // Adjust this based on actual field
                    }
                
                    // Update single matches
                    $updateSingle1 = "UPDATE game_matches SET status = 'game', round = 1, team1 = '{$playerId1[0]}', team1_name = '{$playerName1[0]}', team2 = '{$playerId1[1]}', team2_name = '{$playerName1[1]}' WHERE event_id = '$event_id' AND game_id = '$game_id' AND match_info = 1 AND type = 'single'";
                    mysqli_query($conn, $updateSingle1);
                
                    $updateSingle2 = "UPDATE game_matches SET status = 'game', round = 1, team1 = '{$playerId1[2]}', team1_name = '{$playerName1[2]}', team2 = '{$playerId1[3]}', team2_name = '{$playerName1[3]}' WHERE event_id = '$event_id' AND game_id = '$game_id' AND match_info = 2 AND type = 'single'";
                    mysqli_query($conn, $updateSingle2);
                
                    // Update double matches
                    $updateDouble1 = "UPDATE game_matches SET status = 'game', round = 1, team1 = '{$playerId2_1[0]}', team1_name = '{$playerName2_1[0]}', team1_1 = '{$playerId2_2[0]}', team1_name1 = '{$playerName2_2[0]}', team2 = '{$playerId2_1[1]}', team2_name = '{$playerName2_1[1]}', team2_2 = '{$playerId2_2[1]}', team2_name2 = '{$playerName2_2[1]}' WHERE event_id = '$event_id' AND game_id = '$game_id' AND match_info = 1 AND type = 'double'";
                    mysqli_query($conn, $updateDouble1);
                
                    $updateDouble2 = "UPDATE game_matches SET status = 'game', round = 1, team1 = '{$playerId2_1[2]}', team1_name = '{$playerName2_1[2]}', team1_1 = '{$playerId2_2[2]}', team1_name1 = '{$playerName2_2[2]}', team2 = '{$playerId2_1[3]}', team2_name = '{$playerName2_1[3]}', team2_2 = '{$playerId2_2[3]}', team2_name2 = '{$playerName2_2[3]}' WHERE event_id = '$event_id' AND game_id = '$game_id' AND match_info = 2 AND type = 'double'";
                    mysqli_query($conn, $updateDouble2);
    
                    $playerName1 = [];
                    $playerId1 = [];
                    
                    $playerName2_1 = [];
                    $playerId2_1 = [];
                    $playerName2_2 = [];
                    $playerId2_2 = [];
                }
              
            }
            

            
            function generateRoundRobinMatches($team_count, $game_id, $event_id, $gameType, $conn) {
            //    e retrieve natu  ang mga list sa teams 
                $teams = [];
                $sql = "SELECT id, team_name FROM teams WHERE game_id = $game_id";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    error_log("Error fetching teams: " . mysqli_error($conn));
                    return;
                }
                while ($row = mysqli_fetch_assoc($result)) {
                    $teams[] = $row;
                }
            
                // e ensure natu if sakto ba ang na retrieve na team tanan  
                if (count($teams) != $team_count) {
                    error_log("Team count mismatch. Expected: $team_count, Found: " . count($teams));
                    return;
                }
            
                // if odd ang team then matik atua e list as bye
                if ($team_count % 2 != 0) {
                    $teams[] = ['id' => null, 'team_name' => 'BYE'];
                    $team_count++;
                }
            
                // geenrate new matches and then para iwas mitmatch
                $matches = [];
                $rounds = [];
            
                // algo ne para sa round and matches na ma create
                for ($round = 0; $round < $team_count - 1; $round++) {
                    for ($i = 0; $i < $team_count / 2; $i++) {
                        $team1 = $teams[($round + $i) % ($team_count - 1)];
                        $team2 = $teams[($team_count - 1 - $i + $round) % ($team_count - 1)];
                        if ($i == 0) {
                            $team2 = $teams[$team_count - 1];
                        }
            
                        // skip natu if naay ma labyan na bye
                        if ($team1['id'] !== null && $team2['id'] !== null && $team1['id'] !== $team2['id']) {
                            $rounds[$round][] = [
                                'game_id' => $game_id,
                                'event_id' => $event_id,
                                'game_type' => $gameType,
                                'team1' => $team1['id'],
                                'team1_name' => $team1['team_name'],
                                'team2' => $team2['id'],
                                'team2_name' => $team2['team_name'],
                                'match_info' => $round + 1,
                                'round' => 1
                            ];
                        }
                    }
                }
            
                // atua e procced and round
                foreach ($rounds as $roundMatches) {
                    foreach ($roundMatches as $match) {
                        $matches[] = $match;
                    }
                }
            
                // Insert matches sa database table
                foreach ($matches as $match) {
                    $sql = "INSERT INTO game_matches (game_id, event_id, game_type, match_info, team1, team1_name, team2, team2_name,status) 
                            VALUES ('{$match['game_id']}', '{$match['event_id']}', '{$match['game_type']}', '{$match['match_info']}', '{$match['team1']}', '{$match['team1_name']}', '{$match['team2']}', '{$match['team2_name']}','game')";
                    if (mysqli_query($conn, $sql)) {
                        error_log("Match between {$match['team1_name']} and {$match['team2_name']} inserted successfully.");
                    } else {
                        error_log("Error inserting match between {$match['team1_name']} and {$match['team2_name']}: " . mysqli_error($conn));
                    }
                }
            }
            
            

            


             // function to calculate total matches sa game nga naay single or double category
        function getDoubleEliminationMatchesWithSingleAndDoubleCategory($number, $game_id, $event_id, $gameType, $conn){

        if($gameType == 'Badminton_Men' || $gameType == 'Table_tennis_Men' || $gameType == 'Chess' || $gameType == 'Archery'){
            if($gameType == 'Chess' || $gameType == 'Archery'){
                $players = $number;
            }else{
                $players = $number * 3;
            }
            $winner_number = $players - 1;  // Number sa matches sa winner's bracket
            $loser_number = $players - 1;   // Number sa matches sa loser's bracket
            $totalmatches = $winner_number + $loser_number + 1;  // Total number sa matches
        }else{
            $players = $number * 2;
            $winner_number = $players - 1;  // Number sa matches sa winner's bracket
            $loser_number = $players - 1;   // Number sa matches sa loser's bracket
            $totalmatches = $winner_number + $loser_number + 1;  // Total number sa matches
            
        }
    

        insertIntoDatabaseWithTheTotalMatchesValueWithSingleAndDoubleCategory($totalmatches, $players, $game_id, $event_id, $gameType, $conn);
    }

     // function to calculate total matches sa game nga naay single or double category para sa single elimination game
     function getSingleEliminationMatchesWithSingleAndDoubleCategory($number, $game_id, $event_id, $gameType, $conn){

        if($gameType == 'Badminton_Men' || $gameType == 'Table_tennis_Men' || $gameType == 'Badminton_Women' || $gameType == 'Table_tennis_Women' || $gameType == 'Chess' || $gameType == 'Archery'){
            if($gameType == 'Chess' || $gameType == 'Archery'){
                $players = $number;
            }else{
                $players = $number * 3;
            }
          
            $totalmatches = $players - 1;  // Total number sa matches
        }else{
            $players = $number;
            
          
            $totalmatches = $players - 1;  // Total number sa matches
            
        }
    

        insertIntoDatabaseWithTheTotalMatchesValueWithSingleAndDoubleCategorySingleEliminnation($totalmatches, $players, $game_id, $event_id, $gameType, $conn);
    }

    

    // Function to insert total matches into the database kanang game na naay single and double category
    function insertIntoDatabaseWithTheTotalMatchesValueWithSingleAndDoubleCategory($value, $numPlayers, $game_id, $event_id, $gameType, $conn) {
        for ($x = 1; $x <= $value; $x++) {  // Loop sa total number sa matches
            $match = $x;  // Likay ang label sa match
            $sqlForInsertingMatchesValues = "INSERT INTO game_matches (game_id, event_id, game_type, match_info, team1, team1_name, team2, team2_name) VALUES ('$game_id', '$event_id', '$gameType', '$match', 'Insert Information', '', 'Insert Information', '')";
            if (mysqli_query($conn, $sqlForInsertingMatchesValues)) {
                error_log("Match $match inserted successfully.");
            } else {
                error_log("Error inserting match $match: " . mysqli_error($conn));
            }
        }

        calculateGameStatusAndRoundWithSingleAndDoubleCategory($numPlayers, $game_id, $event_id, $gameType, $conn);  // Calculate ang first round ug byes
    }

    


      // Function to insert total matches into the database kanang game na naay single and double category SINGLE eLIMINATION
      function insertIntoDatabaseWithTheTotalMatchesValueWithSingleAndDoubleCategorySingleEliminnation($value, $numPlayers, $game_id, $event_id, $gameType, $conn) {
        for ($x = 1; $x <= $value; $x++) {  // Loop sa total number sa matches
            $match = $x;  // Likay ang label sa match
            $sqlForInsertingMatchesValues = "INSERT INTO game_matches (game_id, event_id, game_type, match_info, team1, team1_name, team2, team2_name, type) VALUES ('$game_id', '$event_id', '$gameType', '$match', 'Insert Information', '', 'Insert Information', '','single')";
            if (mysqli_query($conn, $sqlForInsertingMatchesValues)) {
                error_log("Match $match inserted successfully.");
            } else {
                error_log("Error inserting match $match: " . mysqli_error($conn));
            }
        }

        for ($x = 1; $x <= $value; $x++) {  // Loop sa total number sa matches
            $match = $x;  // Likay ang label sa match
            $sqlForInsertingMatchesValues = "INSERT INTO game_matches (game_id, event_id, game_type, match_info, team1, team1_name, team2, team2_name,type) VALUES ('$game_id', '$event_id', '$gameType', '$match', 'Insert Information', '', 'Insert Information', '','double')";
            if (mysqli_query($conn, $sqlForInsertingMatchesValues)) {
                error_log("Match $match inserted successfully.");
            } else {
                error_log("Error inserting match $match: " . mysqli_error($conn));
            }
        }

        // calculateGameStatusAndRoundWithSingleAndDoubleCategorySingleElimination($numPlayers, $game_id, $event_id, $gameType, $conn);  // Calculate ang first round ug byes
    }


    // function calculate first round sa game with single and double category
    function calculateGameStatusAndRoundWithSingleAndDoubleCategory($numPlayers, $game_id, $event_id, $gameType, $conn) {
        // Find ang sunod nga power of 2 nga daku o equal sa number sa mga teams
        $nextPowerOfTwo = pow(2, ceil(log($numPlayers) / log(2)));

        // Calculate ang number sa byes
        $numByes = $nextPowerOfTwo - $numPlayers;

        // Generate ang first round sa matches
        generateFirstRoundMatchesWithSingleAndDoubleCategory($numPlayers, $numByes, $game_id, $event_id, $gameType, $conn);
    }

     // function calculate first round sa game with single and double category of Single Elimination
     function calculateGameStatusAndRoundWithSingleAndDoubleCategorySingleElimination($numPlayers, $game_id, $event_id, $gameType, $conn) {
        // Find ang sunod nga power of 2 nga daku o equal sa number sa mga teams
        $nextPowerOfTwo = pow(2, ceil(log($numPlayers) / log(2)));

        // Calculate ang number sa byes
        $numByes = $nextPowerOfTwo - $numPlayers;

        // Generate ang first round sa matches
        generateFirstRoundMatchesWithSingleAndDoubleCategorySingleElimination($numPlayers, $numByes, $game_id, $event_id, $gameType, $conn);
    }


    // Function to generate the first round of matches with single and double category
    function generateFirstRoundMatchesWithSingleAndDoubleCategory($numPlayers, $numByes, $game_id, $event_id, $gameType, $conn) {
        // Retrieve the players from the database
        $players = [];
        if($gameType == 'Badminton_Men' || $gameType == 'Table_tennis_Men' || $gameType == 'Badminton_Women' || $gameType == 'Table_tennis_Women' || $gameType == 'Chess' || $gameType == 'Archery'){
            // single
            $result = mysqli_query($conn, "SELECT id, name FROM players WHERE game_id = $game_id");
            if (!$result) {
                error_log("Error fetching teams: " . mysqli_error($conn));
                return;
            }
            while ($row = mysqli_fetch_assoc($result)) {
                $players[] = $row;  // Store the ID and name of each player
            }

            // Debugging: Print the retrieved players
            error_log("Retrieved players: " . print_r($players, true));

            // Shuffle the players to remove any pattern
            shuffle($players);

            // Assign the byes
            $byePlayer = array_slice($players, 0, $numByes);  // Players receiving a bye
            $playingPlayers = array_slice($players, $numByes);  // Players playing in the first round

            // Debugging: Print the players with byes and the playing players
            error_log("Bye players: " . implode(", ", array_column($byePlayer, 'name')));
            error_log("Playing players: " . implode(", ", array_column($playingPlayers, 'name')));

            // Insert the byes into the database
            foreach ($byePlayer as $player) {
                $match = 'BYE';  // Label for bye matches
                $sqlForInsertingByeMatch = "INSERT INTO game_matches (game_id, event_id, game_type, match_info, team1, team1_name, team2, team2_name) VALUES ('$game_id', '$event_id', '$gameType', '$match', '{$player['id']}', '{$player['name']}', 'BYE', '')";
                if (mysqli_query($conn, $sqlForInsertingByeMatch)) {
                    error_log("Bye match for player {$player['name']} inserted successfully.");
                } else {
                    error_log("Error inserting bye match for player {$player['name']}: " . mysqli_error($conn));
                }
            }
        } else {
            // doubles
            
            $result = mysqli_query($conn, "SELECT id, name, name1 FROM players WHERE game_id = $game_id");
            if (!$result) {
                error_log("Error fetching players: " . mysqli_error($conn));
                return;
            }
            while ($row = mysqli_fetch_assoc($result)) {
                $players[] = $row;  // Store the ID, name, and name1 of each player
            }

            // Debugging: Print the retrieved players
            error_log("Retrieved players: " . print_r($players, true));

            // Shuffle the players to remove any pattern
            shuffle($players);

            // Assign the byes
            $byePlayer = array_slice($players, 0, $numByes);  // Players receiving a bye
            $playingPlayers = array_slice($players, $numByes);  // Players playing in the first round

            // Debugging: Print the players with byes and the playing players
            error_log("Bye players: " . implode(", ", array_column($byePlayer, 'name')));
            error_log("Playing players: " . implode(", ", array_column($playingPlayers, 'name')));

            // Insert the byes into the database
            foreach ($byePlayer as $player) {
                $match = 'BYE';  // Label for bye matches
                $sqlForInsertingByeMatch = "INSERT INTO game_matches (game_id, event_id, game_type, match_info, team1, team1_name, team1_1, team1_name1, team2, team2_name, team2_2, team2_name2) VALUES ('$game_id', '$event_id', '$gameType', '$match', '{$player['id']}', '{$player['name']}','{$player['id']}', '{$player['name1']}', '', 'BYE', '', 'BYE')";
                if (mysqli_query($conn, $sqlForInsertingByeMatch)) {
                    error_log("Bye match for player {$player['name']} and {$player['name1']} inserted successfully.");
                } else {
                    error_log("Error inserting bye match for player {$player['name']} and {$player['name1']}: " . mysqli_error($conn));
                }
            }
        }

        // Update the first round matches with the actual IDs and names of the players
        updateFirstRoundMatchesWithSingleAndDoubleCategory($playingPlayers, $game_id, $event_id, $gameType, $conn);
    }

     // Function to generate the first round of matches with single and double category with single elimination
     function generateFirstRoundMatchesWithSingleAndDoubleCategorySingleElimination($numPlayers, $numByes, $game_id, $event_id, $gameType, $conn) {
        // Retrieve the players from the database
        $players1 = [];
        $players2 = [];
        if($gameType == 'Badminton_Men' || $gameType == 'Table_tennis_Men' || $gameType == 'Badminton_Women' || $gameType == 'Table_tennis_Women' || $gameType == 'Chess' || $gameType == 'Archery'){
            // single
            $result1 = mysqli_query($conn, "SELECT id, name FROM players WHERE game_id = $game_id AND player_number = 'player1'");
            if (!$result1) {
                error_log("Error fetching teams: " . mysqli_error($conn));
                return;
            }
            while ($row1 = mysqli_fetch_assoc($result1)) {
                $players1[] = $row1;  // Store the ID and name of each player
            }

            // Debugging: Print the retrieved players
            error_log("Retrieved players: " . print_r($players1, true));

            // Shuffle the players to remove any pattern
            shuffle($players1);

            // Assign the byes
            $byePlayer1 = array_slice($players1, 0, $numByes);  // Players receiving a bye
            $playingPlayers1 = array_slice($players1, $numByes);  // Players playing in the first round

            // Debugging: Print the players with byes and the playing players
            error_log("Bye players: " . implode(", ", array_column($byePlayer1, 'name')));
            error_log("Playing players: " . implode(", ", array_column($playingPlayers1, 'name')));

            // Insert the byes into the database
            foreach ($byePlayer1 as $player1) {
                $match1 = 'BYE';  // Label for bye matches
                $sqlForInsertingByeMatch1 = "INSERT INTO game_matches (game_id, event_id, game_type, match_info, team1, team1_name, team2, team2_name) VALUES ('$game_id', '$event_id', '$gameType', '$match1', '{$player1['id']}', '{$player1['name']}', 'BYE', '')";
                if (mysqli_query($conn, $sqlForInsertingByeMatch1)) {
                    error_log("Bye match for player {$player1['name']} inserted successfully.");
                } else {
                    error_log("Error inserting bye match for player {$player1['name']}: " . mysqli_error($conn));
                }
            }


            // doubles

            $result2 = mysqli_query($conn, "SELECT id, name FROM players WHERE game_id = $game_id AND player_number = 'player2'");
            if (!$result2) {
                error_log("Error fetching teams: " . mysqli_error($conn));
                return;
            }
            while ($row2 = mysqli_fetch_assoc($result2)) {
                $players2[] = $row2;  // Store the ID and name of each player
            }

            // Debugging: Print the retrieved players
            error_log("Retrieved players: " . print_r($players2, true));

            // Shuffle the players to remove any pattern
            shuffle($players2);

            // Assign the byes
            $byePlayer2 = array_slice($players2, 0, $numByes);  // Players receiving a bye
            $playingPlayers2 = array_slice($players2, $numByes);  // Players playing in the first round

            // Debugging: Print the players with byes and the playing players
            error_log("Bye players: " . implode(", ", array_column($byePlayer2, 'name')));
            error_log("Playing players: " . implode(", ", array_column($playingPlayers2, 'name')));

            // Insert the byes into the database
            foreach ($byePlayer2 as $player2) {
                $match2 = 'BYE';  // Label for bye matches
                $sqlForInsertingByeMatch2 = "INSERT INTO game_matches (game_id, event_id, game_type, match_info, team1, team1_name, team2, team2_name) VALUES ('$game_id', '$event_id', '$gameType', '$match1', '{$player2['id']}', '{$player2['name']}', 'BYE', '')";
                if (mysqli_query($conn, $sqlForInsertingByeMatch1)) {
                    error_log("Bye match for player {$player2['name']} inserted successfully.");
                } else {
                    error_log("Error inserting bye match for player {$player2['name']}: " . mysqli_error($conn));
                }
            }
        } 

        // Update the first round matches with the actual IDs and names of the players
        updateFirstRoundMatchesWithSingleAndDoubleCategorySingleElimination($playingPlayers1,$playingPlayers2, $game_id, $event_id, $gameType, $conn);
    }


    // Function to update ang first round sa matches with ang actual nga IDs ug mga pangalan sa teams game with single and double category
    function updateFirstRoundMatchesWithSingleAndDoubleCategory($playingPlayers, $game_id, $event_id, $gameType, $conn) {

        if($gameType == 'Badminton_Men' || $gameType == 'Table_tennis_Men' || $gameType == 'Badminton_Women' || $gameType == 'Table_tennis_Women' || $gameType == 'Chess' || $gameType == 'Archery'){
            // singles
            // Retrieve ang existing nga Round 1 matches aron i-update sila
                        $sqlFetchMatches = "SELECT id FROM game_matches WHERE game_id = $game_id AND match_info LIKE '%' AND team1 = 'Insert Information'";
                        $result = mysqli_query($conn, $sqlFetchMatches);
                        if (!$result) {
                            error_log("Error fetching Round 1 matches: " . mysqli_error($conn));
                            return;
                        }

                        $matches = [];
                        while ($row = mysqli_fetch_assoc($result)) {
                            $matches[] = $row['id'];  // I-store ang ID sa matag match
                        }

                        // Debugging: Print ang gibalik nga mga matches
                        error_log("Retrieved Round 1 matches: " . print_r($matches, true));

                        // Update ang mga matches with ang round information ug team data
                        foreach ($matches as $index => $match_id) {
                            if (isset($playingPlayers[$index * 2]) && isset($playingPlayers[$index * 2 + 1])) {
                                $team1 = $playingPlayers[$index * 2]['id'];
                                $team1_name = $playingPlayers[$index * 2]['name'];
                                $team2 = $playingPlayers[$index * 2 + 1]['id'];
                                $team2_name = $playingPlayers[$index * 2 + 1]['name'];

                                // Update ang match with actual nga IDs ug mga pangalan sa teams
                                $rnd = 1;
                                $sqlForUpdatingMatches = "UPDATE game_matches SET team1 = '$team1', team1_name = '$team1_name', team2 = '$team2', team2_name = '$team2_name', status = 'game', round = '$rnd' WHERE id = $match_id";
                                if (mysqli_query($conn, $sqlForUpdatingMatches)) {
                                    error_log("Match $match_id updated to Round 1 with teams $team1_name and $team2_name successfully.");
                                } else {
                                    error_log("Error updating match $match_id: " . mysqli_error($conn));
                                }
                            } else {
                                error_log("No more teams available to update for match $match_id.");
                            }
                        }
        }else{
            // doubles
            $sqlFetchMatches = "SELECT id FROM game_matches WHERE game_id = $game_id AND match_info LIKE '%' AND team1 = 'Insert Information'";
                        $result = mysqli_query($conn, $sqlFetchMatches);
                        if (!$result) {
                            error_log("Error fetching Round 1 matches: " . mysqli_error($conn));
                            return;
                        }

                        $matches = [];
                        while ($row = mysqli_fetch_assoc($result)) {
                            $matches[] = $row['id'];  // I-store ang ID sa matag match
                        }

                        // Debugging: Print ang gibalik nga mga matches
                        error_log("Retrieved Round 1 matches: " . print_r($matches, true));

                        // Update ang mga matches with ang round information ug team data
                        foreach ($matches as $index => $match_id) {
                            if (isset($playingPlayers[$index * 2]) && isset($playingPlayers[$index * 2 + 1])) {
                                $team1 = $playingPlayers[$index * 2]['id'];
                                $team1_name = $playingPlayers[$index * 2]['name'];
                                $team1_1 = $playingPlayers[$index * 2]['id'];
                                $team1_name1 = $playingPlayers[$index * 2]['name1'];

                                $team2 = $playingPlayers[$index * 2 + 1]['id'];
                                $team2_name = $playingPlayers[$index * 2 + 1]['name'];
                                $team2_1 = $playingPlayers[$index * 2 + 1]['id'];
                                $team2_name1 = $playingPlayers[$index * 2 + 1]['name1'];

                                // Update ang match with actual nga IDs ug mga pangalan sa teams
                                $rnd = 1;
                                $sqlForUpdatingMatches = "UPDATE game_matches SET team1 = '$team1', team1_name = '$team1_name', team1_1 = '$team1_1', team1_name1 = '$team1_name1', team2 = '$team2', team2_name = '$team2_name', team2_2 = '$team2_1', team2_name2 = '$team2_name1', status = 'game', round = '$rnd' WHERE id = $match_id";
                                if (mysqli_query($conn, $sqlForUpdatingMatches)) {
                                    error_log("Match $match_id updated to Round 1 with teams $team1_name and $team2_name successfully.");
                                } else {
                                    error_log("Error updating match $match_id: " . mysqli_error($conn));
                                }
                            } else {
                                error_log("No more teams available to update for match $match_id.");
                            }
                        }
        }
    
    }

      // Function to update ang first round sa matches with ang actual nga IDs ug mga pangalan sa teams game with single and double category single elimination
      function updateFirstRoundMatchesWithSingleAndDoubleCategorySingleElimination($playingPlayers1,$playingPlayers2, $game_id, $event_id, $gameType, $conn) {

        if($gameType == 'Badminton_Men' || $gameType == 'Table_tennis_Men' || $gameType == 'Badminton_Women' || $gameType == 'Table_tennis_Women' || $gameType == 'Chess' || $gameType == 'Archery'){
            // singles
            // Retrieve ang existing nga Round 1 matches aron i-update sila
                        $sqlFetchMatches1 = "SELECT id FROM game_matches WHERE game_id = $game_id AND match_info LIKE '%' AND team1 = 'Insert Information' AND team1_name1 IS NULL";
                        $result1 = mysqli_query($conn, $sqlFetchMatches1);
                        if (!$result1) {
                            error_log("Error fetching Round 1 matches: " . mysqli_error($conn));
                            return;
                        }

                        $matches1 = [];
                        while ($row1 = mysqli_fetch_assoc($result1)) {
                            $matches1[] = $row1['id'];  // I-store ang ID sa matag match
                        }

                        // Debugging: Print ang gibalik nga mga matches
                        error_log("Retrieved Round 1 matches: " . print_r($matches1, true));

                        // Update ang mga matches with ang round information ug team data
                        foreach ($matches1 as $index1 => $match_id1) {
                            if (isset($playingPlayers1[$index1 * 2]) && isset($playingPlayers1[$index1 * 2 + 1])) {
                                $team1_1 = $playingPlayers1[$index1 * 2]['id'];
                                $team1_name_1 = $playingPlayers1[$index1 * 2]['name'];
                                $team2_1 = $playingPlayers1[$index1 * 2 + 1]['id'];
                                $team2_name_1 = $playingPlayers1[$index1 * 2 + 1]['name'];

                                // Update ang match with actual nga IDs ug mga pangalan sa teams
                                $rnd = 1;
                                $sqlForUpdatingMatches1 = "UPDATE game_matches SET team1 = '$team1_1', team1_name = '$team1_name_1', team2 = '$team2_1', team2_name = '$team2_name_1', status = 'game', round = '$rnd' WHERE id = $match_id";
                                if (mysqli_query($conn, $sqlForUpdatingMatches1)) {
                                    error_log("Match $match_id1 updated to Round 1 with teams $team1_name_1 and $team2_name_1 successfully.");
                                } else {
                                    error_log("Error updating match $match_id1: " . mysqli_error($conn));
                                }
                            } else {
                                error_log("No more teams available to update for match $match_id1.");
                            }
                        }
        }
    
    }

    // Function to calculate total matches for double elimination
    function getDoubleEliminationMatches($number, $game_id, $event_id, $gameType, $conn) {
        $winner_number = $number - 1;  // Number sa matches sa winner's bracket
        $loser_number = $number - 1;   // Number sa matches sa loser's bracket
        $totalmatches = $winner_number + $loser_number + 1;  // Total number sa matches

        insertIntoDatabaseWithTheTotalMatchesValue($totalmatches, $number, $game_id, $event_id, $gameType, $conn);  // Insert ang mga matches sa database
    }
     // Function to calculate total matches for double elimination for SEG
     function getSingleEliminationMatches($number, $game_id, $event_id, $gameType, $conn) {
        
        $totalmatches = $number - 1;  // Total number sa matches

        insertIntoDatabaseWithTheTotalMatchesValueForSEG($totalmatches, $number, $game_id, $event_id, $gameType, $conn);  // Insert ang mga matches sa database
    }

    function getModifiedSingleEliminationMatches($number, $game_id, $event_id, $gameType, $conn) {
        
        $totalmatches = 4;  // Total number sa matches

        insertIntoDatabaseWithTheTotalMatchesValueForSEG($totalmatches, $number, $game_id, $event_id, $gameType, $conn);  // Insert ang mga matches sa database
    }

    // Function to insert total matches into the database
    function insertIntoDatabaseWithTheTotalMatchesValue($value, $numTeams, $game_id, $event_id, $gameType, $conn) {
        for ($x = 1; $x <= $value; $x++) {  // Loop sa total number sa matches
            $match = $x;  // Likay ang label sa match
            $sqlForInsertingMatchesValues = "INSERT INTO game_matches (game_id, event_id, game_type, match_info, team1, team1_name, team2, team2_name) VALUES ('$game_id', '$event_id', '$gameType', '$match', 'Insert Information', '', 'Insert Information', '')";
            if (mysqli_query($conn, $sqlForInsertingMatchesValues)) {
                error_log("Match $match inserted successfully.");
            } else {
                error_log("Error inserting match $match: " . mysqli_error($conn));
            }
        }

        calculateGameStatusAndRound($numTeams, $game_id, $event_id, $gameType, $conn);  // Calculate ang first round ug byes
    }

     // Function to insert total matches into the database for SEG
     function insertIntoDatabaseWithTheTotalMatchesValueForSEG($value, $numTeams, $game_id, $event_id, $gameType, $conn) {
        for ($x = 1; $x <= $value; $x++) {  // Loop sa total number sa matches
            $match = $x;  // Likay ang label sa match
            $sqlForInsertingMatchesValues = "INSERT INTO game_matches (game_id, event_id, game_type, match_info, team1, team1_name, team2, team2_name) VALUES ('$game_id', '$event_id', '$gameType', '$match', 'Insert Information', '', 'Insert Information', '')";
            if (mysqli_query($conn, $sqlForInsertingMatchesValues)) {
                error_log("Match $match inserted successfully.");
            } else {
                error_log("Error inserting match $match: " . mysqli_error($conn));
            }
        }

        calculateGameStatusAndRound($numTeams, $game_id, $event_id, $gameType, $conn);  // Calculate ang first round ug byes
    }

    // Function to calculate the first round and byes
    function calculateGameStatusAndRound($numTeams, $game_id, $event_id, $gameType, $conn) {
        // Find ang sunod nga power of 2 nga daku o equal sa number sa mga teams
        $nextPowerOfTwo = pow(2, ceil(log($numTeams) / log(2)));

        // Calculate ang number sa byes
        $numByes = $nextPowerOfTwo - $numTeams;

        // Generate ang first round sa matches
        generateFirstRoundMatches($numTeams, $numByes, $game_id, $event_id, $gameType, $conn);
    }

    // Function to generate the first round of matches
    function generateFirstRoundMatches($numTeams, $numByes, $game_id, $event_id, $gameType, $conn) {
        // Retrieve ang mga teams gikan sa database
        $teams = [];
        $result = mysqli_query($conn, "SELECT id, team_name FROM teams WHERE game_id = $game_id");
        if (!$result) {
            error_log("Error fetching teams: " . mysqli_error($conn));
            return;
        }
        while ($row = mysqli_fetch_assoc($result)) {
            $teams[] = $row;  // I-store ang ID ug pangalan sa kada team
        }

        // Debugging: Print ang gibalik nga mga teams
        error_log("Retrieved teams: " . print_r($teams, true));

        // Shuffle ang mga teams aron mawala ang pattern
        shuffle($teams);

        // Assign ang mga byes
        $byeTeams = array_slice($teams, 0, $numByes);  // Mga teams nga makadawat ug bye
        $playingTeams = array_slice($teams, $numByes);  // Mga teams nga magduwa sa first round

        // Debugging: Print ang mga teams nga naay byes ug nagaduwa nga mga teams
        error_log("Bye teams: " . implode(", ", array_column($byeTeams, 'team_name')));
        error_log("Playing teams: " . implode(", ", array_column($playingTeams, 'team_name')));

        // Insert ang mga byes sa database
        foreach ($byeTeams as $team) {
            $match = 'BYE';  // Label para sa mga bye matches
            $sqlForInsertingByeMatch = "INSERT INTO game_matches (game_id, event_id, game_type, match_info, team1, team1_name, team2, team2_name) VALUES ('$game_id', '$event_id', '$gameType', '$match', '{$team['id']}', '{$team['team_name']}', 'BYE', '')";
            if (mysqli_query($conn, $sqlForInsertingByeMatch)) {
                error_log("Bye match for team {$team['team_name']} inserted successfully.");
            } else {
                error_log("Error inserting bye match for team {$team['team_name']}: " . mysqli_error($conn));
            }
        }

        // Update ang first round sa matches with ang actual nga IDs ug mga pangalan sa teams
        updateFirstRoundMatches($playingTeams, $game_id, $event_id, $gameType, $conn);
    }

    // Function to update ang first round sa matches with ang actual nga IDs ug mga pangalan sa teams
    function updateFirstRoundMatches($playingTeams, $game_id, $event_id, $gameType, $conn) {
        // Retrieve ang existing nga Round 1 matches aron i-update sila
        $sqlFetchMatches = "SELECT id FROM game_matches WHERE game_id = $game_id AND match_info LIKE '%' AND team1 = 'Insert Information'";
        $result = mysqli_query($conn, $sqlFetchMatches);
        if (!$result) {
            error_log("Error fetching Round 1 matches: " . mysqli_error($conn));
            return;
        }

        $matches = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $matches[] = $row['id'];  // I-store ang ID sa matag match
        }

        // Debugging: Print ang gibalik nga mga matches
        error_log("Retrieved Round 1 matches: " . print_r($matches, true));

        // Update ang mga matches with ang round information ug team data
        foreach ($matches as $index => $match_id) {
            if (isset($playingTeams[$index * 2]) && isset($playingTeams[$index * 2 + 1])) {
                $team1 = $playingTeams[$index * 2]['id'];
                $team1_name = $playingTeams[$index * 2]['team_name'];
                $team2 = $playingTeams[$index * 2 + 1]['id'];
                $team2_name = $playingTeams[$index * 2 + 1]['team_name'];

                // Update ang match with actual nga IDs ug mga pangalan sa teams
                $rnd = 1;
                $sqlForUpdatingMatches = "UPDATE game_matches SET team1 = '$team1', team1_name = '$team1_name', team2 = '$team2', team2_name = '$team2_name', status = 'game', round = '$rnd' WHERE id = $match_id";
                if (mysqli_query($conn, $sqlForUpdatingMatches)) {
                    error_log("Match $match_id updated to Round 1 with teams $team1_name and $team2_name successfully.");
                } else {
                    error_log("Error updating match $match_id: " . mysqli_error($conn));
                }
            } else {
                error_log("No more teams available to update for match $match_id.");
            }
        }
    }

        
    

?>



