<?php

session_start();
include('../connection/conn.php');


        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $teamOneScore = isset($_POST['teamOneScore']) ? $_POST['teamOneScore'] : null;
            $teamTwoScore = isset($_POST['teamTwoScore']) ? $_POST['teamTwoScore'] : null;
            $teamOneName = isset($_POST['teamOneName']) ? $_POST['teamOneName'] : null;
            $teamTwoName = isset($_POST['teamTwoName']) ? $_POST['teamTwoName'] : null;
            $teamOneName1 = isset($_POST['teamOneName1']) ? $_POST['teamOneName1'] : null;
            $teamTwoName1 = isset($_POST['teamTwoName1']) ? $_POST['teamTwoName1'] : null;
            $team1_id = isset($_POST['team1_id']) ? $_POST['team1_id'] : null;
            $team2_id = isset($_POST['team2_id']) ? $_POST['team2_id'] : null;
            $gameType = isset($_POST['game_type']) ? $_POST['game_type'] : null;
            $gameId = isset($_POST['game_id']) ? $_POST['game_id'] : null;
            $eventId = isset($_POST['event_id']) ? $_POST['event_id'] : null;
            $id = isset($_POST['id']) ? $_POST['id'] : null;

           $eliType = getEliType($conn,$gameId);

            if($eliType == 'DEG'){
                    // for double elimination game

                if ($gameType == 'Basketball_Men' || $gameType == 'Basketball_Women' || $gameType == 'Vollayball_Men' || $gameType == 'Vollayball_Women' || $gameType == 'Softball_Men' || $gameType == 'Softball_Women' || $gameType == 'MLBB' || $gameType == 'Futsal_Men' || $gameType == 'Futsal_Women'){
                    // game on list kanang nag kuan ug by teams
                        if($teamOneScore > $teamTwoScore){
                                $winnerId = $team1_id;
                                $loserId = $team2_id;
                          
                                    $sqlFOrWinner = "UPDATE teams SET last_match_status = 'Winner', winner_number = winner_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND team_name = '$teamOneName'";
                                    mysqli_query($conn,$sqlFOrWinner);
                                    DetermineBracket($conn,$eventId,$gameId,$winnerId,"Winner");
                                    
                                    $sqlForLoser = "UPDATE teams SET last_match_status = 'Loser', lose_number = lose_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND team_name = '$teamTwoName'";
                                    mysqli_query($conn,$sqlForLoser);
                                    DetermineBracket($conn,$eventId,$gameId,$loserId,"Loser");
            
                                    specialMatchPending($conn,$eventId,$gameId,$id,$winnerId,$teamOneName);
            
            
            
                                        
                                  
                        }else{
                                $winnerId = $team2_id;
                                $loserId = $team1_id;
            
                      
                                    $sqlFOrWinner = "UPDATE teams SET last_match_status = 'Winner', winner_number = winner_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND team_name = '$teamTwoName'";
                                    mysqli_query($conn,$sqlFOrWinner);
                                    DetermineBracket($conn,$eventId,$gameId,$winnerId,"Winner");
            
                                    $sqlForLoser = "UPDATE teams SET last_match_status = 'Loser', lose_number = lose_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND team_name = '$teamOneName'";
                                    mysqli_query($conn,$sqlForLoser);
                                    DetermineBracket($conn,$eventId,$gameId,$loserId,"Loser");
            
                                    specialMatchPending($conn,$eventId,$gameId,$id,$winnerId,$teamTwoName);
                             
                        }
            
                        $sqlUpdateOfWinnerAndLoserId = "UPDATE game_matches SET team_one_score = $teamOneScore, team_two_score = $teamTwoScore, winner_id = $winnerId, loser_id = $loserId, status = 'SCORE' WHERE id = $id";
                        mysqli_query($conn,$sqlUpdateOfWinnerAndLoserId);
            
                        // call the function para ma kuha ang value sa current na round
                        $currentRound = getCurrentRound($conn,$gameId,$eventId);
            
                        // call the function para ma check if naa pay wala na score sa round 
                        $checkRound = checkIfThereStillMatchesNotScoredInThisRound($conn,$gameId,$eventId,$currentRound);
                        if($checkRound == false){
                                // call the function para ma balik sa game list na page!
                                backToGameList($eventId,$gameId,$gameType);
                        }else{
                            //    check natu if naa bay bye!
                                $bye = checkIfByeExist($conn,$eventId,$gameId);
            
                                // call the genratedRound function para e execute
                                generateNewRound($conn,$eventId,$gameId,$bye,$gameType);
                                
                                
                        }
        
                    }else if($gameType == 'Chess' || $gameType == 'Archery'){
                            // handle games like sa mga teams with player ang style like table tennis and badmnton 
                            if($gameType == 'Chess' || $gameType == 'Archery'){
                                // singles  
                                    if($teamOneScore > $teamTwoScore){
                                                $winnerId = $team1_id;
                                                $loserId = $team2_id;
                                        
                                                    $sqlFOrWinner = "UPDATE players SET last_match_status = 'Winner', winner_number = winner_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND name = '$teamOneName'";
                                                    mysqli_query($conn,$sqlFOrWinner);
                                                    DetermineBracketWithSingleAndDoubleCategory($conn,$eventId,$gameId,$winnerId,"Winner",$gameType);
                                                    
                                                    $sqlForLoser = "UPDATE players SET last_match_status = 'Loser', lose_number = lose_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND name = '$teamTwoName'";
                                                    mysqli_query($conn,$sqlForLoser);
                                                    DetermineBracketWithSingleAndDoubleCategory($conn,$eventId,$gameId,$loserId,"Loser",$gameType);
                        
                                                    specialMatchPendingWithSingleAndDoubleCategory($conn,$eventId,$gameId,$id,$winnerId,$teamOneName,'',$gameType);
                            
                            
                            
                                                        
                                                
                                        }else{
                                                $winnerId = $team2_id;
                                                $loserId = $team1_id;
                            
                                    
                                                    $sqlFOrWinner = "UPDATE players SET last_match_status = 'Winner', winner_number = winner_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND name = '$teamTwoName'";
                                                    mysqli_query($conn,$sqlFOrWinner);
                                                    DetermineBracketWithSingleAndDoubleCategory($conn,$eventId,$gameId,$winnerId,"Winner",$gameType);
                            
                                                    $sqlForLoser = "UPDATE players SET last_match_status = 'Loser', lose_number = lose_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND name = '$teamOneName'";
                                                    mysqli_query($conn,$sqlForLoser);
                                                    DetermineBracketWithSingleAndDoubleCategory($conn,$eventId,$gameId,$loserId,"Loser",$gameType);
                            
                                                    specialMatchPendingWithSingleAndDoubleCategory($conn,$eventId,$gameId,$id,$winnerId,$teamTwoName,'',$gameType);
                                            
                                        }
                            }else{
                                // doubles 
                                            if($teamOneScore > $teamTwoScore){
                                                $winnerId = $team1_id;
                                                $loserId = $team2_id;
                                        
                                                    $sqlFOrWinner = "UPDATE players SET last_match_status = 'Winner', winner_number = winner_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND name = '$teamOneName' AND name1 = '$teamOneName1'";
                                                    mysqli_query($conn,$sqlFOrWinner);
                                                    DetermineBracketWithSingleAndDoubleCategory($conn,$eventId,$gameId,$winnerId,"Winner",$gameType);
                                                    
                                                    $sqlForLoser = "UPDATE players SET last_match_status = 'Loser', lose_number = lose_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND name = '$teamTwoName' AND name1 = '$teamTwoName1'";
                                                    mysqli_query($conn,$sqlForLoser);
                                                    DetermineBracketWithSingleAndDoubleCategory($conn,$eventId,$gameId,$loserId,"Loser",$gameType);
                        
                                                    specialMatchPendingWithSingleAndDoubleCategory($conn,$eventId,$gameId,$id,$winnerId,$teamOneName,$teamOneName1,$gameType);
                            
                            
                            
                                                        
                                                
                                        }else{
                                                $winnerId = $team2_id;
                                                $loserId = $team1_id;
                            
                                    
                                                    $sqlFOrWinner = "UPDATE players SET last_match_status = 'Winner', winner_number = winner_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND name = '$teamTwoName' AND name1 = '$teamTwoName1'";
                                                    mysqli_query($conn,$sqlFOrWinner);
                                                    DetermineBracketWithSingleAndDoubleCategory($conn,$eventId,$gameId,$winnerId,"Winner",$gameType);
                            
                                                    $sqlForLoser = "UPDATE players SET last_match_status = 'Loser', lose_number = lose_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND name = '$teamOneName' AND name1 = '$teamOneName1'";
                                                    mysqli_query($conn,$sqlForLoser);
                                                    DetermineBracketWithSingleAndDoubleCategory($conn,$eventId,$gameId,$loserId,"Loser",$gameType);
                                                    
                            
                                                    specialMatchPendingWithSingleAndDoubleCategory($conn,$eventId,$gameId,$id,$winnerId,$teamTwoName,$teamTwoName1,$gameType);
                                                
                                        }
                            }
        
        
                            $sqlUpdateOfWinnerAndLoserId = "UPDATE game_matches SET team_one_score = $teamOneScore, team_two_score = $teamTwoScore, winner_id = $winnerId, loser_id = $loserId, status = 'SCORE' WHERE id = $id";
                            mysqli_query($conn,$sqlUpdateOfWinnerAndLoserId);
        
                        
                             // call the function para ma kuha ang value sa current na round
                             $currentRound = getCurrentRound($conn,$gameId,$eventId);
        
                             // call the function para ma check if naa pay wala na score sa round 
                             $checkRound = checkIfThereStillMatchesNotScoredInThisRound($conn,$gameId,$eventId,$currentRound);
        
                                    if($checkRound == false){
                                        // call the function para ma balik sa game list na page!
                                        backToGameList($eventId,$gameId,$gameType);
                                    }else{
                                        //    check natu if naa bay bye!
                                            $bye = checkIfByeExist($conn,$eventId,$gameId);
                        
                                            // call the genratedRound function para e execute
                                            generateNewRoundWIthSingleAndDoubleCategory($conn,$eventId,$gameId,$bye,$gameType);
                                            
                                            
                                            
                                    }
        
                    }
                    
                   
            }else if($eliType == 'SEG'){
                    // for single elinmination game
                 
                    if ($gameType == 'Basketball_Men' || $gameType == 'Basketball_Women' || $gameType == 'Vollayball_Men' || $gameType == 'Vollayball_Women' || $gameType == 'Softball_Men' || $gameType == 'Softball_Women' || $gameType == 'MLBB' || $gameType == 'Futsal_Men' || $gameType == 'Futsal_Women'){
                        // game on list kanang nag kuan ug by teams
                            if($teamOneScore > $teamTwoScore){
                                    $winnerId = $team1_id;
                                    $loserId = $team2_id;
                              
                                        $sqlFOrWinner = "UPDATE teams SET last_match_status = 'Winner', winner_number = winner_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND team_name = '$teamOneName'";
                                        mysqli_query($conn,$sqlFOrWinner);
                                        
                                        DetermineBracket($conn,$eventId,$gameId,$winnerId,"Winner");
                                        
                                        $sqlForLoser = "UPDATE teams SET last_match_status = 'Loser', bracket_status = 1, lose_number = lose_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND team_name = '$teamTwoName'";
                                        mysqli_query($conn,$sqlForLoser);
                                       
                                        
                                        specialMatchPending($conn,$eventId,$gameId,$id,$winnerId,$teamOneName);
                
                
                
                                            
                                      
                            }else{
                                    $winnerId = $team2_id;
                                    $loserId = $team1_id;
                
                          
                                        $sqlFOrWinner = "UPDATE teams SET last_match_status = 'Winner', winner_number = winner_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND team_name = '$teamTwoName'";
                                        mysqli_query($conn,$sqlFOrWinner);
                                        DetermineBracket($conn,$eventId,$gameId,$winnerId,"Winner");
                
                                        $sqlForLoser = "UPDATE teams SET last_match_status = 'Loser', bracket_status = 1, lose_number = lose_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND team_name = '$teamOneName'";
                                        mysqli_query($conn,$sqlForLoser);
                                      
                
                                        specialMatchPending($conn,$eventId,$gameId,$id,$winnerId,$teamTwoName);
                                 
                            }
                
                            $sqlUpdateOfWinnerAndLoserId = "UPDATE game_matches SET team_one_score = $teamOneScore, team_two_score = $teamTwoScore, winner_id = $winnerId, loser_id = $loserId, status = 'SCORE' WHERE id = $id";
                            mysqli_query($conn,$sqlUpdateOfWinnerAndLoserId);
                
                            // call the function para ma kuha ang value sa current na round
                            $currentRound = getCurrentRound($conn,$gameId,$eventId);
                
                            // call the function para ma check if naa pay wala na score sa round 
                            $checkRound = checkIfThereStillMatchesNotScoredInThisRound($conn,$gameId,$eventId,$currentRound);
                            if($checkRound == false){
                                    // call the function para ma balik sa game list na page!
                                    backToGameList($eventId,$gameId,$gameType);
                            }else{
                                //    check natu if naa bay bye!
                                
                                    $bye = checkIfByeExist($conn,$eventId,$gameId);
                
                                    // call the genratedRound function para e execute
                                    
                                    generateNewRoundForSEG($conn,$eventId,$gameId,$bye,$gameType);
                                    
                                    
                            }
            
                        }else if($gameType == 'Chess' || $gameType == 'Archery'){
                                // handle games like sa mga teams with player ang style like table tennis and badmnton 
                                if($gameType == 'Chess' || $gameType == 'Archery'){
                                    // singles  
                                        if($teamOneScore > $teamTwoScore){
                                                    $winnerId = $team1_id;
                                                    $loserId = $team2_id;
                                            
                                                        $sqlFOrWinner = "UPDATE players SET last_match_status = 'Winner', winner_number = winner_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND name = '$teamOneName'";
                                                        mysqli_query($conn,$sqlFOrWinner);
                                                        
                                                        DetermineBracketWithSingleAndDoubleCategory($conn,$eventId,$gameId,$winnerId,"Winner",$gameType);
                                                        
                                                        $sqlForLoser = "UPDATE players SET last_match_status = 'Loser', bracket_status = 1, lose_number = lose_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND name = '$teamTwoName'";
                                                        mysqli_query($conn,$sqlForLoser);
                                                      
                            
                                                        specialMatchPendingWithSingleAndDoubleCategory($conn,$eventId,$gameId,$id,$winnerId,$teamOneName,'',$gameType);
                                
                                
                                
                                                            
                                                    
                                            }else{
                                                    $winnerId = $team2_id;
                                                    $loserId = $team1_id;
                                
                                        
                                                        $sqlFOrWinner = "UPDATE players SET last_match_status = 'Winner', winner_number = winner_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND name = '$teamTwoName'";
                                                        mysqli_query($conn,$sqlFOrWinner);
                                                        DetermineBracketWithSingleAndDoubleCategory($conn,$eventId,$gameId,$winnerId,"Winner",$gameType);
                                
                                                        $sqlForLoser = "UPDATE players SET last_match_status = 'Loser', bracket_status = 1, lose_number = lose_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND name = '$teamOneName'";
                                                        mysqli_query($conn,$sqlForLoser);
                                                       
                                
                                                        specialMatchPendingWithSingleAndDoubleCategory($conn,$eventId,$gameId,$id,$winnerId,$teamTwoName,'',$gameType);
                                                
                                            }
                                }else{
                                    // doubles 
                                                if($teamOneScore > $teamTwoScore){
                                                    $winnerId = $team1_id;
                                                    $loserId = $team2_id;
                                            
                                                        $sqlFOrWinner = "UPDATE players SET last_match_status = 'Winner', winner_number = winner_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND name = '$teamOneName' AND name1 = '$teamOneName1'";
                                                        mysqli_query($conn,$sqlFOrWinner);
                                                        DetermineBracketWithSingleAndDoubleCategory($conn,$eventId,$gameId,$winnerId,"Winner",$gameType);
                                                        
                                                        $sqlForLoser = "UPDATE players SET last_match_status = 'Loser', lose_number = lose_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND name = '$teamTwoName' AND name1 = '$teamTwoName1'";
                                                        mysqli_query($conn,$sqlForLoser);
                                                        DetermineBracketWithSingleAndDoubleCategory($conn,$eventId,$gameId,$loserId,"Loser",$gameType);
                            
                                                        specialMatchPendingWithSingleAndDoubleCategory($conn,$eventId,$gameId,$id,$winnerId,$teamOneName,$teamOneName1,$gameType);
                                
                                
                                
                                                            
                                                    
                                            }else{
                                                    $winnerId = $team2_id;
                                                    $loserId = $team1_id;
                                
                                        
                                                        $sqlFOrWinner = "UPDATE players SET last_match_status = 'Winner', winner_number = winner_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND name = '$teamTwoName' AND name1 = '$teamTwoName1'";
                                                        mysqli_query($conn,$sqlFOrWinner);
                                                        DetermineBracketWithSingleAndDoubleCategory($conn,$eventId,$gameId,$winnerId,"Winner",$gameType);
                                
                                                        $sqlForLoser = "UPDATE players SET last_match_status = 'Loser', lose_number = lose_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND name = '$teamOneName' AND name1 = '$teamOneName1'";
                                                        mysqli_query($conn,$sqlForLoser);
                                                        DetermineBracketWithSingleAndDoubleCategory($conn,$eventId,$gameId,$loserId,"Loser",$gameType);
                                                        
                                
                                                        specialMatchPendingWithSingleAndDoubleCategory($conn,$eventId,$gameId,$id,$winnerId,$teamTwoName,$teamTwoName1,$gameType);
                                                    
                                            }
                                }
                                
                              
                                $sqlUpdateOfWinnerAndLoserId = "UPDATE game_matches SET team_one_score = $teamOneScore, team_two_score = $teamTwoScore, winner_id = $winnerId, loser_id = $loserId, status = 'SCORE' WHERE id = $id";
                                mysqli_query($conn,$sqlUpdateOfWinnerAndLoserId);
            
                            
                                 // call the function para ma kuha ang value sa current na round
                                 $currentRound = getCurrentRound($conn,$gameId,$eventId);
            
                                 // call the function para ma check if naa pay wala na score sa round 
                                 $checkRound = checkIfThereStillMatchesNotScoredInThisRound($conn,$gameId,$eventId,$currentRound);
            
                                        if($checkRound == false){
                                            
                                            // call the function para ma balik sa game list na page!
                                            backToGameList($eventId,$gameId,$gameType);
                                        }else{


                                            $bye = checkIfByeExist($conn,$eventId,$gameId);
                            
                                            // call the genratedRound function para e execute
                                              
                                              generateNewRoundWIthSingleAndDoubleCategoryForSEG($conn,$eventId,$gameId,$bye,$gameType);
                                      
                                                
                                                
                                                
                                                
                                        }
            
                        }
                    

            }else if($eliType == 'SRRG'){
                    // for single round robin
                    /*
                    $teamOneScore = isset($_POST['teamOneScore']) ? $_POST['teamOneScore'] : null;
                  ` $teamTwoScore = isset($_POST['teamTwoScore']) ? $_POST['teamTwoScore'] : null;
                    $teamOneName = isset($_POST['teamOneName']) ? $_POST['teamOneName'] : null;
                    $teamTwoName = isset($_POST['teamTwoName']) ? $_POST['teamTwoName'] : null;
                    $teamOneName1 = isset($_POST['teamOneName1']) ? $_POST['teamOneName1'] : null;
                    $teamTwoName1 = isset($_POST['teamTwoName1']) ? $_POST['teamTwoName1'] : null;
                    $team1_id = isset($_POST['team1_id']) ? $_POST['team1_id'] : null;
                    $team2_id = isset($_POST['team2_id']) ? $_POST['team2_id'] : null;
                    $gameType = isset($_POST['game_type']) ? $_POST['game_type'] : null;
                    $gameId = isset($_POST['game_id']) ? $_POST['game_id'] : null;
                    $eventId = isset($_POST['event_id']) ? $_POST['event_id'] : null;
                    $id = isset($_POST['id']) ? $_POST['id'] : null;

                    $eliType = getEliType($conn,$gameId);`
                    */


                      echo $teamOneScore;
                      echo $id;
                    if($teamOneScore > $teamTwoScore){
                            $winner = $team1_id;
                            $loser = $team2_id;
                    }else{
                        $winner = $team2_id;
                        $loser = $team1_id;
                    }

                    $updateSRRB = "UPDATE game_matches SET team_one_score = '$teamOneScore', team_two_score = '$teamTwoScore', winner_id = '$winner', loser_id = '$loser', status = 'SCORE' WHERE id = '$id'";
                    mysqli_query($conn,$updateSRRB);

                    backToGameList($eventId,$gameId,$gameType);

                    

            }else if($eliType == 'MSEG'){
                // for single elinmination game
         
            if ($gameType == 'Basketball_Men' || $gameType == 'Basketball_Women' || $gameType == 'Vollayball_Men' || $gameType == 'Vollayball_Women' || $gameType == 'Softball_Men' || $gameType == 'Softball_Women' || $gameType == 'MLBB' || $gameType == 'Futsal_Men' || $gameType == 'Futsal_Women'){
                // game on list kanang nag kuan ug by teams
                    if($teamOneScore > $teamTwoScore){
                            $winnerId = $team1_id;
                            $loserId = $team2_id;
                      
                                $sqlFOrWinner = "UPDATE teams SET last_match_status = 'Winner', winner_number = winner_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND team_name = '$teamOneName'";
                                mysqli_query($conn,$sqlFOrWinner);
                                
                                DetermineBracket($conn,$eventId,$gameId,$winnerId,"Winner");
                                
                                $sqlForLoser = "UPDATE teams SET last_match_status = 'Loser', bracket_status = 1, lose_number = lose_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND team_name = '$teamTwoName'";
                                mysqli_query($conn,$sqlForLoser);
                               
                         
                              
                    }else{
                            $winnerId = $team2_id;
                            $loserId = $team1_id;
        
                  
                                $sqlFOrWinner = "UPDATE teams SET last_match_status = 'Winner', winner_number = winner_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND team_name = '$teamTwoName'";
                                mysqli_query($conn,$sqlFOrWinner);

                                DetermineBracket($conn,$eventId,$gameId,$winnerId,"Winner");
        
                                $sqlForLoser = "UPDATE teams SET last_match_status = 'Loser', bracket_status = 1, lose_number = lose_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND team_name = '$teamOneName'";
                                mysqli_query($conn,$sqlForLoser);
                              
        
                               
                         
                    }


        
                    $sqlUpdateOfWinnerAndLoserId = "UPDATE game_matches SET team_one_score = $teamOneScore, team_two_score = $teamTwoScore, winner_id = $winnerId, loser_id = $loserId, status = 'SCORE' WHERE id = $id";
                    mysqli_query($conn,$sqlUpdateOfWinnerAndLoserId);
        
                    // call the function para ma kuha ang value sa current na round
                    $currentRound = getCurrentRound($conn,$gameId,$eventId);

                  
                    // call the function para ma check if naa pay wala na score sa round 
                    $checkRound = checkIfThereStillMatchesNotScoredInThisRound($conn,$gameId,$eventId,$currentRound);
                    if($checkRound == false){
                            // call the function para ma balik sa game list na page!
                                
                                    backToGameList($eventId,$gameId,$gameType);
                                
                    }else{
                        
                            $nextRound = $currentRound + 1;

                            if($nextRound == 2){
                                    // for bronze or 3rd runner up ( winner )

                                    $type = 'bronze';

                                    getNewGameForCustom($conn,$gameId,$eventId,$type);
                                        

                            }else if($nextRound == 3){
                                    // for finals ( winner ) 1st and ( loser ) 2nd

                                    addMedalTeamGames($conn,$gameId,$eventId,'bronze');
                                    

                                    $type = 'silverANDgold';

                                    getNewGameForCustom($conn,$gameId,$eventId,$type);
                            }else if($nextRound == 4){
                                addMedalTeamGames($conn,$gameId,$eventId,'silverANDgold');

                                backToGameList($eventId,$gameId,$gameType);
                            }

                            backToGameList($eventId,$gameId,$gameType);
                            
                            
                    }
    
                  }else if($gameType == 'Chess' || $gameType == 'Archery'){
                        // handle games like sa mga teams with player ang style like table tennis and badmnton 
                        if($gameType == 'Chess' || $gameType == 'Archery'){
                            // singles  
                                if($teamOneScore > $teamTwoScore){
                                            $winnerId = $team1_id;
                                            $loserId = $team2_id;
                                    
                                                $sqlFOrWinner = "UPDATE players SET last_match_status = 'Winner', winner_number = winner_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND name = '$teamOneName'";
                                                mysqli_query($conn,$sqlFOrWinner);
                                                
                                                DetermineBracketWithSingleAndDoubleCategory($conn,$eventId,$gameId,$winnerId,"Winner",$gameType);
                                                
                                                $sqlForLoser = "UPDATE players SET last_match_status = 'Loser', bracket_status = 1, lose_number = lose_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND name = '$teamTwoName'";
                                                mysqli_query($conn,$sqlForLoser);
                                              
                    
                                                specialMatchPendingWithSingleAndDoubleCategory($conn,$eventId,$gameId,$id,$winnerId,$teamOneName,'',$gameType);
                        
                        
                                   
                                                    
                                            
                                    }else{
                                            $winnerId = $team2_id;
                                            $loserId = $team1_id;
                        
                                
                                                $sqlFOrWinner = "UPDATE players SET last_match_status = 'Winner', winner_number = winner_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND name = '$teamTwoName'";
                                                mysqli_query($conn,$sqlFOrWinner);
                                                DetermineBracketWithSingleAndDoubleCategory($conn,$eventId,$gameId,$winnerId,"Winner",$gameType);
                        
                                                $sqlForLoser = "UPDATE players SET last_match_status = 'Loser', bracket_status = 1, lose_number = lose_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND name = '$teamOneName'";
                                                mysqli_query($conn,$sqlForLoser);
                                               
                        
                                                specialMatchPendingWithSingleAndDoubleCategory($conn,$eventId,$gameId,$id,$winnerId,$teamTwoName,'',$gameType);
                                        
                                    }

                                    $sqlUpdateOfWinnerAndLoserId = "UPDATE game_matches SET team_one_score = $teamOneScore, team_two_score = $teamTwoScore, winner_id = $winnerId, loser_id = $loserId, status = 'SCORE' WHERE id = $id";
                                    mysqli_query($conn,$sqlUpdateOfWinnerAndLoserId);


                                      // call the function para ma kuha ang value sa current na round
                                    $currentRound = getCurrentRound($conn,$gameId,$eventId);
                                    $checkRound = checkIfThereStillMatchesNotScoredInThisRound($conn,$gameId,$eventId,$currentRound);
                                    if($checkRound == false){
                                        // call the function para ma balik sa game list na page!

                                      
                                                backToGameList($eventId,$gameId,$gameType);
                                            
                                        }else{
                                            $nextRound = $currentRound + 1;


                                           

                                            if($gameType == 'Chess'){
                                                    if($nextRound == 2){
                                                        generateChessMatchesRound2($conn,$eventId,$gameId);
                                                    }else if($nextRound == 3){
                                                        generateChessMatchesRound3($conn,$eventId,$gameId);
                                                    }else if($nextRound == 4){
                                                        // for bronze or 3rd runner up ( winner )
                    
                                                        $type = 'bronze';
                    
                                                        getNewGameForCustomSoloChess($conn,$gameId,$eventId,$type);
                                                            
                    
                                                    }else if($nextRound == 5){
                                                        // for finals ( winner ) 1st and ( loser ) 2nd
                                                        addMedalPlayersChess($conn,$gameId,$eventId,'bronze');
                    
                                                        $type = 'silverANDgold';
                    
                                                        getNewGameForCustomSoloChess($conn,$gameId,$eventId,$type);
                                                    }else if($nextRound == 6){
                                                        addMedalPlayersChess($conn,$gameId,$eventId,'silverANDgold');
                                                        
                                                        backToGameList($eventId,$gameId,$gameType);
                                                    }
                                            }else{
                                                if($nextRound == 2){
                                                    // for bronze or 3rd runner up ( winner )
                
                                                    $type = 'bronze';
                
                                                    getNewGameForCustomSolo($conn,$gameId,$eventId,$type);
                                                        
                
                                                }else if($nextRound == 3){
                                                        // for finals ( winner ) 1st and ( loser ) 2nd
                                                        addMedalPlayers($conn,$gameId,$eventId,'bronze');
                    
                                                        $type = 'silverANDgold';
                    
                                                        getNewGameForCustomSolo($conn,$gameId,$eventId,$type);
                                                }else if($nextRound == 4){
                                                    addMedalPlayers($conn,$gameId,$eventId,'silverANDgold');
                                                    
                                                    backToGameList($eventId,$gameId,$gameType);
                                                }
                                            }
                                           
                
                                            backToGameList($eventId,$gameId,$gameType);
                                        }
                                    
                        }

                }
            
                   
        
        
        }
    }


    function addMedalPlayersChess($conn,$gameId,$eventId,$type){

        if($type == 'silverANDgold'){

                // silver

                $addSilverSQL = "SELECT * FROM game_matches WHERE game_id = '$gameId' AND event_id = '$eventId' AND match_info = 16";
                $querySilver = mysqli_query($conn,$addSilverSQL);

                $loserID = 0;
                $LoserTeamID = 0;
                $LoserTeam = '';

                $getSilver = mysqli_fetch_assoc($querySilver);

                $loserID = $getSilver['loser_id'];
                

                $LoserPlayerSQL = "SELECT * FROM players WHERE id = $loserID";
                $queryLoserPlayer = mysqli_query($conn,$LoserPlayerSQL);

                $getDataLoserPlayer  = mysqli_fetch_assoc($queryLoserPlayer);

                $LoserTeamID = $getDataLoserPlayer['team_id'];

                // get team

                $LoserTeamSQL = "SELECT * FROM teams WHERE id = $LoserTeamID";
                $queryLoser = mysqli_query($conn,$LoserTeamSQL);

                $getDataLoser  = mysqli_fetch_assoc($queryLoser);

                $LoserTeam = $getDataLoser['team_name'];

                // update silver medal
                $updateSilverSQL = "UPDATE tally SET SILVER = SILVER + 1 WHERE event_id = '$eventId' AND team_name = '$LoserTeam'";
                mysqli_query($conn,$updateSilverSQL);


                // gold

                 $addGoldSQL = "SELECT * FROM game_matches WHERE game_id = '$gameId' AND event_id = '$eventId' AND match_info = 16";
                 $queryGold = mysqli_query($conn,$addGoldSQL);
 
                 $WinnerID = 0;
                 $WinnerTeamID = 0;
                 $WinnerTeam = '';
 
                 $getGold = mysqli_fetch_assoc($queryGold);
 
                 $WinnerID = $getGold['winner_id'];
                 
 
                 $WinnerPlayerSQL = "SELECT * FROM players WHERE id = $WinnerID";
                 $queryWinnerPlayer = mysqli_query($conn,$WinnerPlayerSQL);
 
                 $getDataWinnerPlayer  = mysqli_fetch_assoc($queryWinnerPlayer);
 
                 $WinnerTeamID = $getDataWinnerPlayer['team_id'];
 
                 // get team
 
                 $WinnerTeamSQL = "SELECT * FROM teams WHERE id = $WinnerTeamID";
                 $queryWinner = mysqli_query($conn,$WinnerTeamSQL);
 
                 $getDataWinner  = mysqli_fetch_assoc($queryWinner);
 
                 $WinnerTeam = $getDataWinner['team_name'];
 
                 // update Gold medal
                 $updateGoldSQL = "UPDATE tally SET GOLD = GOLD + 1 WHERE event_id = '$eventId' AND team_name = '$WinnerTeam'";
                 mysqli_query($conn,$updateGoldSQL);

              
        }else{
            $addBronzeSQL = "SELECT * FROM game_matches WHERE game_id = '$gameId' AND event_id = '$eventId' AND match_info = 15";
            $queryBronze = mysqli_query($conn,$addBronzeSQL);

            $WinnerID = 0;
            $WinnerTeamID = 0;
            $WinnerTeam = '';

            $getBronze = mysqli_fetch_assoc($queryBronze);

            $WinnerID = $getBronze['winner_id'];
            

            $WinnerPlayerSQL = "SELECT * FROM players WHERE id = $WinnerID";
            $queryWinnerPlayer = mysqli_query($conn,$WinnerPlayerSQL);

            $getDataWinnerPlayer  = mysqli_fetch_assoc($queryWinnerPlayer);

            $WinnerTeamID = $getDataWinnerPlayer['team_id'];

            // get team

            $WinnerTeamSQL = "SELECT * FROM teams WHERE id = $WinnerTeamID";
            $queryWinner = mysqli_query($conn,$WinnerTeamSQL);

            $getDataWinner  = mysqli_fetch_assoc($queryWinner);

            $WinnerTeam = $getDataWinner['team_name'];

            // update Bronze medal
            $updateBronzeSQL = "UPDATE tally SET BRONZE = BRONZE + 1 WHERE event_id = '$eventId' AND team_name = '$WinnerTeam'";
            mysqli_query($conn,$updateBronzeSQL);
        }

}


    function getNewGameForCustomSoloChess($conn,$gameId,$eventId,$type){

          

        if($type == 'bronze'){
                    // set finals
                    $winnnerId = [];
                    $getMatchesFor3ndRound = "SELECT * FROM players WHERE game_id = '$gameId' AND event_id = '$eventId' AND bracket = 'W' AND last_match_status = 'Winner'";
                    $query = mysqli_query($conn,$getMatchesFor3ndRound);

                    while($getData = mysqli_fetch_assoc($query)){
                        $winnnerId[] = $getData['id'];
                    }

                    for($b = 0; $b < 2; $b++){
                        $sqlUPdatePlayers = "UPDATE players SET advance = 'last' WHERE id = $winnnerId[$b]";
                        mysqli_query($conn,$sqlUPdatePlayers);
                    }


                    // for 3rd  
                        $getMatchesFor2ndRound = "SELECT * FROM players WHERE game_id = '$gameId' AND event_id = '$eventId' AND bracket = 'W' AND last_match_status = 'Loser' AND advance = 'final'";
                        $query = mysqli_query($conn,$getMatchesFor2ndRound);

                        $loserName = [];
                        $loserId = [];
                        while($getData = mysqli_fetch_assoc($query)){
                            $loserName[] = $getData['name'];
                            $loserId[] = $getData['id'];
                        }

                        $Name1 = $loserName[0];
                        $Name2 = $loserName[1];
                        $Name1Id = $loserId[0];
                        $Name2Id = $loserId[1];
                        $match_info = 15;

                        $update2ndRound = "UPDATE game_matches SET status = 'game', round = '4', team1 = '$Name1Id', team1_name = '$Name1', team2 = '$Name2Id', team2_name = '$Name2' WHERE game_id = '$gameId' AND event_id = '$eventId' AND match_info = '$match_info'";
                        mysqli_query($conn,$update2ndRound);

        }else{
                // for 1st and 2nd


                $getMatchesFor3ndRound = "SELECT * FROM players WHERE game_id = '$gameId' AND event_id = '$eventId' AND bracket = 'W' AND last_match_status = 'Winner' AND advance = 'last'";
                        $query = mysqli_query($conn,$getMatchesFor3ndRound);

                        $WinnerName = [];
                        $WinnerId = [];
                        while($getData = mysqli_fetch_assoc($query)){
                            $WinnerName[] = $getData['name'];
                            $WinnerId[] = $getData['id'];
                        }

                        $Name1 = $WinnerName[0];
                        $Name2 = $WinnerName[1];
                        $Name1Id = $WinnerId[0];
                        $Name2Id = $WinnerId[1];
                        $match_info = 16;

                        $update3ndRound = "UPDATE game_matches SET status = 'game', round = '5', team1 = '$Name1Id', team1_name = '$Name1', team2 = '$Name2Id', team2_name = '$Name2' WHERE game_id = '$gameId' AND event_id = '$eventId' AND match_info = '$match_info'";
                        mysqli_query($conn,$update3ndRound);

        }
}

        function generateChessMatchesRound3($conn,$event_id,$game_id){
            $playerName1 = [];
            $playerId1 = [];
        


            // Get data for player1
            $getAllData = "SELECT * FROM players WHERE game_id = $game_id AND event_id = $event_id AND bracket = 'W' AND last_match_status = 'Winner' ORDER BY RAND()";
            $result1 = mysqli_query($conn, $getAllData);
            while ($get1 = mysqli_fetch_assoc($result1)) {
                $playerName1[] = $get1['name'];
                $playerId1[] = $get1['id'];
            }
            

            for($y = 0; $y < 4; $y++){
                    $sqlAdvance = "UPDATE players SET advance = 'final' WHERE id = '$playerId1[$y]'";
                    mysqli_query($conn,$sqlAdvance);
            }
            


                $updateSingle1 = "UPDATE game_matches SET status = 'game', round = 3, team1 = '{$playerId1[0]}', team1_name = '{$playerName1[0]}', team2 = '{$playerId1[3]}', team2_name = '{$playerName1[3]}' WHERE event_id = '$event_id' AND game_id = '$game_id' AND match_info = 13";
                mysqli_query($conn, $updateSingle1);
            
                $updateSingle2 = "UPDATE game_matches SET status = 'game', round = 3, team1 = '{$playerId1[1]}', team1_name = '{$playerName1[1]}', team2 = '{$playerId1[2]}', team2_name = '{$playerName1[2]}' WHERE event_id = '$event_id' AND game_id = '$game_id' AND match_info = 14";
                mysqli_query($conn, $updateSingle2);

                $playerName1 = [];
                $playerId1 = [];
        

        }


    function generateChessMatchesRound2($conn,$event_id,$game_id){
        $playerName1 = [];
        $playerId1 = [];
        $playerName2 = [];
        $playerId2 = [];
        $playerName3 = [];
        $playerId3 = [];
        $playerName4 = [];
        $playerId4 = [];


          // Get data for player1
          $getAllData = "SELECT * FROM players WHERE game_id = $game_id AND event_id = $event_id AND player_number = 'player1' AND bracket = 'W' ORDER BY RAND()";
          $result1 = mysqli_query($conn, $getAllData);
          while ($get1 = mysqli_fetch_assoc($result1)) {
              $playerName1[] = $get1['name'];
              $playerId1[] = $get1['id'];
          }
          
           // Get data for player2
           $getAllData2 = "SELECT * FROM players WHERE game_id = $game_id AND event_id = $event_id AND player_number = 'player2' AND bracket = 'W' ORDER BY RAND()";
           $result2 = mysqli_query($conn, $getAllData2);
           while ($get2 = mysqli_fetch_assoc($result2)) {
               $playerName2[] = $get2['name'];
               $playerId2[] = $get2['id'];
           }

            // Get data for player3
            $getAllData3 = "SELECT * FROM players WHERE game_id = $game_id AND event_id = $event_id AND player_number = 'player3' AND bracket = 'W' ORDER BY RAND()";
            $result3 = mysqli_query($conn, $getAllData3);
            while ($get3 = mysqli_fetch_assoc($result3)) {
                $playerName3[] = $get3['name'];
                $playerId3[] = $get3['id'];
            }

            // Get data for player4
            $getAllData4 = "SELECT * FROM players WHERE game_id = $game_id AND event_id = $event_id AND player_number = 'player4' AND bracket = 'W' ORDER BY RAND()";
            $result4 = mysqli_query($conn, $getAllData4);
            while ($get4 = mysqli_fetch_assoc($result4)) {
                $playerName4[] = $get4['name'];
                $playerId4[] = $get4['id'];
            }


            $updateSingle1 = "UPDATE game_matches SET status = 'game', round = 2, team1 = '{$playerId1[0]}', team1_name = '{$playerName1[0]}', team2 = '{$playerId1[1]}', team2_name = '{$playerName1[1]}' WHERE event_id = '$event_id' AND game_id = '$game_id' AND match_info = 9";
            mysqli_query($conn, $updateSingle1);
        
            $updateSingle2 = "UPDATE game_matches SET status = 'game', round = 2, team1 = '{$playerId2[0]}', team1_name = '{$playerName2[0]}', team2 = '{$playerId2[1]}', team2_name = '{$playerName2[1]}' WHERE event_id = '$event_id' AND game_id = '$game_id' AND match_info = 10";
            mysqli_query($conn, $updateSingle2);

            $updateSingle3 = "UPDATE game_matches SET status = 'game', round = 2, team1 = '{$playerId3[0]}', team1_name = '{$playerName3[0]}', team2 = '{$playerId3[1]}', team2_name = '{$playerName3[1]}' WHERE event_id = '$event_id' AND game_id = '$game_id' AND match_info = 11";
            mysqli_query($conn, $updateSingle3);
        
            $updateSingle4 = "UPDATE game_matches SET status = 'game', round = 2, team1 = '{$playerId4[0]}', team1_name = '{$playerName4[0]}', team2 = '{$playerId4[1]}', team2_name = '{$playerName4[1]}' WHERE event_id = '$event_id' AND game_id = '$game_id' AND match_info = 12";
            mysqli_query($conn, $updateSingle4);

       

         

    }
    

    function addMedalPlayers($conn,$gameId,$eventId,$type){

        if($type == 'silverANDgold'){

                // silver

                $addSilverSQL = "SELECT * FROM game_matches WHERE game_id = '$gameId' AND event_id = '$eventId' AND match_info = 4";
                $querySilver = mysqli_query($conn,$addSilverSQL);

                $loserID = 0;
                $LoserTeamID = 0;
                $LoserTeam = '';

                $getSilver = mysqli_fetch_assoc($querySilver);

                $loserID = $getSilver['loser_id'];
                

                $LoserPlayerSQL = "SELECT * FROM players WHERE id = $loserID";
                $queryLoserPlayer = mysqli_query($conn,$LoserPlayerSQL);

                $getDataLoserPlayer  = mysqli_fetch_assoc($queryLoserPlayer);

                $LoserTeamID = $getDataLoserPlayer['team_id'];

                // get team

                $LoserTeamSQL = "SELECT * FROM teams WHERE id = $LoserTeamID";
                $queryLoser = mysqli_query($conn,$LoserTeamSQL);

                $getDataLoser  = mysqli_fetch_assoc($queryLoser);

                $LoserTeam = $getDataLoser['team_name'];

                // update silver medal
                $updateSilverSQL = "UPDATE tally SET SILVER = SILVER + 1 WHERE event_id = '$eventId' AND team_name = '$LoserTeam'";
                mysqli_query($conn,$updateSilverSQL);


                // gold

                 $addGoldSQL = "SELECT * FROM game_matches WHERE game_id = '$gameId' AND event_id = '$eventId' AND match_info = 4";
                 $queryGold = mysqli_query($conn,$addGoldSQL);
 
                 $WinnerID = 0;
                 $WinnerTeamID = 0;
                 $WinnerTeam = '';
 
                 $getGold = mysqli_fetch_assoc($queryGold);
 
                 $WinnerID = $getGold['winner_id'];
                 
 
                 $WinnerPlayerSQL = "SELECT * FROM players WHERE id = $WinnerID";
                 $queryWinnerPlayer = mysqli_query($conn,$WinnerPlayerSQL);
 
                 $getDataWinnerPlayer  = mysqli_fetch_assoc($queryWinnerPlayer);
 
                 $WinnerTeamID = $getDataWinnerPlayer['team_id'];
 
                 // get team
 
                 $WinnerTeamSQL = "SELECT * FROM teams WHERE id = $WinnerTeamID";
                 $queryWinner = mysqli_query($conn,$WinnerTeamSQL);
 
                 $getDataWinner  = mysqli_fetch_assoc($queryWinner);
 
                 $WinnerTeam = $getDataWinner['team_name'];
 
                 // update Gold medal
                 $updateGoldSQL = "UPDATE tally SET GOLD = GOLD + 1 WHERE event_id = '$eventId' AND team_name = '$WinnerTeam'";
                 mysqli_query($conn,$updateGoldSQL);

              
        }else{
            $addBronzeSQL = "SELECT * FROM game_matches WHERE game_id = '$gameId' AND event_id = '$eventId' AND match_info = 3";
            $queryBronze = mysqli_query($conn,$addBronzeSQL);

            $WinnerID = 0;
            $WinnerTeamID = 0;
            $WinnerTeam = '';

            $getBronze = mysqli_fetch_assoc($queryBronze);

            $WinnerID = $getBronze['winner_id'];
            

            $WinnerPlayerSQL = "SELECT * FROM players WHERE id = $WinnerID";
            $queryWinnerPlayer = mysqli_query($conn,$WinnerPlayerSQL);

            $getDataWinnerPlayer  = mysqli_fetch_assoc($queryWinnerPlayer);

            $WinnerTeamID = $getDataWinnerPlayer['team_id'];

            // get team

            $WinnerTeamSQL = "SELECT * FROM teams WHERE id = $WinnerTeamID";
            $queryWinner = mysqli_query($conn,$WinnerTeamSQL);

            $getDataWinner  = mysqli_fetch_assoc($queryWinner);

            $WinnerTeam = $getDataWinner['team_name'];

            // update Bronze medal
            $updateBronzeSQL = "UPDATE tally SET BRONZE = BRONZE + 1 WHERE event_id = '$eventId' AND team_name = '$WinnerTeam'";
            mysqli_query($conn,$updateBronzeSQL);
        }

}


        function addMedalTeamGames($conn,$gameId,$eventId,$type){

                    if($type == 'silverANDgold'){

                            // silver

                            $addSilverSQL = "SELECT * FROM game_matches WHERE game_id = '$gameId' AND event_id = '$eventId' AND match_info = 4";
                            $querySilver = mysqli_query($conn,$addSilverSQL);

                            $loserID = 0;
                            $LoserTeam = '';

                            $getSilver = mysqli_fetch_assoc($querySilver);

                                    $loserID = $getSilver['loser_id'];
                            

                            $LoserTeamSQL = "SELECT * FROM teams WHERE id = $loserID";
                            $queryLoser = mysqli_query($conn,$LoserTeamSQL);

                            $getDataLoser  = mysqli_fetch_assoc($queryLoser);

                            $LoserTeam = $getDataLoser['team_name'];

                            // update silver medal
                            $updateSilverSQL = "UPDATE tally SET SILVER = SILVER + 5 WHERE event_id = '$eventId' AND team_name = '$LoserTeam'";
                            mysqli_query($conn,$updateSilverSQL);


                            // gold


                            $addGoldSQL = "SELECT * FROM game_matches WHERE game_id = '$gameId' AND event_id = '$eventId' AND match_info = 4";
                            $queryGold = mysqli_query($conn,$addGoldSQL);

                            $winnerID = 0;
                            $winnerTeam = '';

                            $getGold = mysqli_fetch_assoc($queryGold);

                                    $winnerID = $getGold['winner_id'];
                            

                            $winnerTeamSQL = "SELECT * FROM teams WHERE id = $winnerID";
                            $queryWinner = mysqli_query($conn,$winnerTeamSQL);

                            $getDataWinner  = mysqli_fetch_assoc($queryWinner);

                            $winnerTeam = $getDataWinner['team_name'];

                            // update bronze medal
                            $updateGoldSQL = "UPDATE tally SET GOLD = GOLD + 5 WHERE event_id = '$eventId' AND team_name = '$winnerTeam'";
                            mysqli_query($conn,$updateGoldSQL);

                          
                    }else{
                            $addBronzeSQL = "SELECT * FROM game_matches WHERE game_id = '$gameId' AND event_id = '$eventId' AND match_info = 3";
                            $query = mysqli_query($conn,$addBronzeSQL);

                            $winnerID = 0;
                            $winnerTeam = '';

                            $getBronze = mysqli_fetch_assoc($query);

                                    $winnerID = $getBronze['winner_id'];
                            

                            $winnerTeamSQL = "SELECT * FROM teams WHERE id = $winnerID";
                            $queryWinner = mysqli_query($conn,$winnerTeamSQL);

                            $getDataWinner  = mysqli_fetch_assoc($queryWinner);

                            $winnerTeam = $getDataWinner['team_name'];

                            // update bronze medal
                            $updateBronzeSQL = "UPDATE tally SET BRONZE = BRONZE + 5 WHERE event_id = '$eventId' AND team_name = '$winnerTeam'";
                            mysqli_query($conn,$updateBronzeSQL);
                    }

        }
    



        

        // generate match for Modified Game
        function getNewGameForCustom($conn,$gameId,$eventId,$type){


                if($type == 'bronze'){
                        // for 3rd  
                            
                                $getMatchesFor2ndRound = "SELECT * FROM teams WHERE game_id = '$gameId' AND event_id = '$eventId' AND last_match_status = 'Loser'";
                                $query = mysqli_query($conn,$getMatchesFor2ndRound);

                                $loserTeam = [];
                                $loserId = [];
                                while($getData = mysqli_fetch_assoc($query)){
                                    $loserTeam[] = $getData['team_name'];
                                    $loserId[] = $getData['id'];
                                }

                                $team1 = $loserTeam[0];
                                $team2 = $loserTeam[1];
                                $team1Id = $loserId[0];
                                $team2Id = $loserId[1];
                                $match_info = 3;

                                $update2ndRound = "UPDATE game_matches SET status = 'game', round = '2', team1 = '$team1Id', team1_name = '$team1', team2 = '$team2Id', team2_name = '$team2' WHERE game_id = '$gameId' AND event_id = '$eventId' AND match_info = '$match_info'";
                                mysqli_query($conn,$update2ndRound);


                }else{
                        // for 1st and 2nd


                        $getMatchesFor3ndRound = "SELECT * FROM teams WHERE game_id = '$gameId' AND event_id = '$eventId' AND bracket = 'W'";
                                $query = mysqli_query($conn,$getMatchesFor3ndRound);

                                $WinnerTeam = [];
                                $WinnerId = [];
                                while($getData = mysqli_fetch_assoc($query)){
                                    $WinnerTeam[] = $getData['team_name'];
                                    $WinnerId[] = $getData['id'];
                                }

                                $team1 = $WinnerTeam[0];
                                $team2 = $WinnerTeam[1];
                                $team1Id = $WinnerId[0];
                                $team2Id = $WinnerId[1];
                                $match_info = 4;

                                $update3ndRound = "UPDATE game_matches SET status = 'game', round = '3', team1 = '$team1Id', team1_name = '$team1', team2 = '$team2Id', team2_name = '$team2' WHERE game_id = '$gameId' AND event_id = '$eventId' AND match_info = '$match_info'";
                                mysqli_query($conn,$update3ndRound);

                }
        }

          // generate match for Modified Game
          function getNewGameForCustomSolo($conn,$gameId,$eventId,$type){

          

            if($type == 'bronze'){
                    // for 3rd  
                            $getMatchesFor2ndRound = "SELECT * FROM players WHERE game_id = '$gameId' AND event_id = '$eventId' AND last_match_status = 'Loser'";
                            $query = mysqli_query($conn,$getMatchesFor2ndRound);

                            $loserName = [];
                            $loserId = [];
                            while($getData = mysqli_fetch_assoc($query)){
                                $loserName[] = $getData['name'];
                                $loserId[] = $getData['id'];
                            }

                            $Name1 = $loserName[0];
                            $Name2 = $loserName[1];
                            $Name1Id = $loserId[0];
                            $Name2Id = $loserId[1];
                            $match_info = 3;

                            $update2ndRound = "UPDATE game_matches SET status = 'game', round = '2', team1 = '$Name1Id', team1_name = '$Name1', team2 = '$Name2Id', team2_name = '$Name2' WHERE game_id = '$gameId' AND event_id = '$eventId' AND match_info = '$match_info'";
                            mysqli_query($conn,$update2ndRound);

            }else{
                    // for 1st and 2nd


                    $getMatchesFor3ndRound = "SELECT * FROM players WHERE game_id = '$gameId' AND event_id = '$eventId' AND bracket = 'W'";
                            $query = mysqli_query($conn,$getMatchesFor3ndRound);

                            $WinnerName = [];
                            $WinnerId = [];
                            while($getData = mysqli_fetch_assoc($query)){
                                $WinnerName[] = $getData['name'];
                                $WinnerId[] = $getData['id'];
                            }

                            $Name1 = $WinnerName[0];
                            $Name2 = $WinnerName[1];
                            $Name1Id = $WinnerId[0];
                            $Name2Id = $WinnerId[1];
                            $match_info = 4;

                            $update3ndRound = "UPDATE game_matches SET status = 'game', round = '3', team1 = '$Name1Id', team1_name = '$Name1', team2 = '$Name2Id', team2_name = '$Name2' WHERE game_id = '$gameId' AND event_id = '$eventId' AND match_info = '$match_info'";
                            mysqli_query($conn,$update3ndRound);

            }
    }


        // get eliminationtype 
        function getEliType($conn,$gameId){
            $getDataEliType = "SELECT * FROM registered_game WHERE id = $gameId";
            $query = mysqli_query($conn,$getDataEliType);
            $result = mysqli_fetch_assoc($query);

            return $result['EliminationType'];
        }

    // function ne para ma determine if loser or winner bracket sija with single and double category
    function DetermineBracketWithSingleAndDoubleCategory($conn,$eventId,$gameId,$id,$condition,$gameType){
        if($gameType == 'Chess' || $gameType == 'Archery'){
            // singles
            $sqlCheck = "SELECT * FROM players WHERE event_id = $eventId AND game_id = $gameId and id = $id";
            $query = mysqli_query($conn,$sqlCheck);
            $result = mysqli_fetch_assoc($query);
    
            if($result['bracket_status'] == 1){
                return null;
            }else{
                    if($condition == 'Winner'){
                        $sqlUpdate = "UPDATE players SET bracket = 'W', bracket_status = 1 WHERE id = $id";
                        mysqli_query($conn,$sqlUpdate);
                    }else{
                        $sqlUpdate = "UPDATE players SET bracket = 'L', bracket_status = 1 WHERE id = $id";
                        mysqli_query($conn,$sqlUpdate);
                    }
            }
        }else{
            // doubles

            $sqlCheck = "SELECT * FROM players WHERE event_id = $eventId AND game_id = $gameId and id = $id";
            $query = mysqli_query($conn,$sqlCheck);
            $result = mysqli_fetch_assoc($query);
    
            if($result['bracket_status'] == 1){
                return null;
            }else{
                    if($condition == 'Winner'){
                        $sqlUpdate = "UPDATE players SET bracket = 'W', bracket_status = 1 WHERE id = $id";
                        mysqli_query($conn,$sqlUpdate);
                    }else{
                        $sqlUpdate = "UPDATE players SET bracket = 'L', bracket_status = 1 WHERE id = $id";
                        mysqli_query($conn,$sqlUpdate);
                    }
            }

        }
       
}

 // function para ma check if need ba e update and current na match with single and double category
 function specialMatchPendingWithSingleAndDoubleCategory($conn,$eventId,$gameId,$id,$winnerId,$name,$name1,$gameType){

    if($gameType == 'Chess' || $gameType == 'Archery'){
        // singles
        $nextId = $id + 1;
        $sql = "SELECT * FROM game_matches WHERE id = $nextId";
        $query = mysqli_query($conn,$sql);
    
        $result = mysqli_fetch_assoc($query);
    
        if($result['team2_name'] == 'PENDING'){
                
                $sqlUpdate = "UPDATE game_matches SET team2 = $winnerId, team2_name = '$name' WHERE id = $nextId";
                mysqli_query($conn,$sqlUpdate);
    
        }else{
           
            return null;
        }

    }else{
        // doubles

        $nextId = $id + 1;
        $sql = "SELECT * FROM game_matches WHERE id = $nextId";
        $query = mysqli_query($conn,$sql);
    
        $result = mysqli_fetch_assoc($query);
    
        if($result['team2_name'] == 'PENDING'){
                
                $sqlUpdate = "UPDATE game_matches SET team2 = $winnerId, team2_name = '$name', team2_2 = $winnerId, team2_name2 = '$name1' WHERE id = $nextId";
                mysqli_query($conn,$sqlUpdate);
    
        }else{
            return null;
        }
    }  

}

// generation for single and double category SEG
function generateNewRoundWIthSingleAndDoubleCategoryForSEG($conn,$eventId,$gameId,$bye,$gameType){
    

    if($gameType == 'Chess' || $gameType == 'Archery'){
        // singles
        if($bye == true){

            // if naay bye
            $sql = "SELECT * FROM game_matches WHERE event_id = $eventId AND game_id = $gameId AND (match_info = 'BYE' OR status = 'SCORE') ORDER BY id DESC";
            $query = mysqli_query($conn, $sql);
    
            $teamId = [];
            $teamName = [];
            $count = 0;
    
            $nextIdOfMatch = getNextIdOfMatchToBeUpdated($conn, $eventId, $gameId) + 1;
    
            while($test = mysqli_fetch_assoc($query)){
                if($test['match_info'] == 'BYE'){
                    $teamId[$count] = $test['team1'];
                    $teamName[$count] = $test['team1_name'];
                }else {
                    if($test['team_one_score'] > $test['team_two_score']){
                        $teamId[$count] = $test['team1'];
                        $teamName[$count] = $test['team1_name'];
    
                        
                    } else {
                        $teamId[$count] = $test['team2'];
                        $teamName[$count] = $test['team2_name'];
    
                       
                    }
                }
    
                $count++;
    
                if($count == 2){
                  
    
                    $sqlForUpdate = "UPDATE game_matches SET team1 = $teamId[0], team1_name = '$teamName[0]', team2 = $teamId[1], team2_name = '$teamName[1]', status = 'game', round = 2 WHERE id = $nextIdOfMatch";
                    mysqli_query($conn, $sqlForUpdate);
    
                   
                    if(mysqli_affected_rows($conn) > 0){
                        echo "Next match updated successfully.<br>";
                    } else {
                        echo "Failed to update next match.<br>";
                    }
    
                    echo 'id = ' .$nextIdOfMatch . '<br>';
                    echo 'round = '.$newRound . '<br>';
    
                    echo 'teamId1 = '. $teamId[0] . '<br>';
                    echo 'teamName1 = '. $teamName[0] . '<br>';
                    echo 'teamId2 = '. $teamId[1] . '<br>';
                    echo 'teamName2 = '.$teamName[1] . '<br>';
    
                    // Reset the arrays and count for the next pair
                    $teamId = [];
                    $teamName = [];
                    $count = 0;
    
                    // Move to the next match ID
                    $nextIdOfMatch++;
                }
            }
    
            $deleteBye = "DELETE FROM game_matches WHERE game_id = $gameId AND event_id = $eventId AND match_info = 'BYE'";
                if(mysqli_query($conn,$deleteBye)){
                    echo 'delete succesfully';
                }
    
            // Call the function para mo balik sa game list na page!
            backToGameList($eventId, $gameId, $gameType);
        } else {
            // if walay bye, add your logic for generating new rounds without byes here
            
            
               $sqlCheckTeams = "SELECT * FROM players WHERE game_id = $gameId AND event_id = $eventId AND lose_number <= 0";
               $queryCheckTeams = mysqli_query($conn,$sqlCheckTeams);
    
               $checkValue = 0;
    
               while($check = mysqli_fetch_assoc($queryCheckTeams)){
    
                    $checkValue += 1;

               }
    
               if($checkValue == 2){
    
                    $team_name = [];
                    $team_name1 = [];
                    $team_id = [];
   
                    LastGamesWithSingleAndDoubleCategoryForSEG($conn,$eventId,$gameId,$team_name,$team_name1,$team_id,$gameType); 
                   
                     
                     $team_name1 = $team_name[0];
                     $team_name2 = $team_name[1];
                     $team1_id = $team_id[0];
                     $team2_id = $team_id[1];
    
                     $nextRound = getCurrentRound($conn,$gameId,$eventId) + 1;
                     $nextId = getNextIdOfMatchToBeUpdated($conn,$eventId,$gameId) + 1;
    
                    $sql = "UPDATE game_matches SET status = 'game', round = $nextRound, team1 = $team1_id, team1_name = '$team_name1', team2 = $team2_id, team2_name = '$team_name2' WHERE id = $nextId";
                    mysqli_query($conn,$sql);
    
                    backToGameList($eventId, $gameId, $gameType);
    
               }else if($checkValue == 1){  
    
                    $sql = "DELETE FROM game_matches WHERE event_id = $eventId AND game_id = $gameId AND status = ''";
                    mysqli_query($conn,$sql);
                    backToGameList($eventId, $gameId, $gameType);
    
    
               }else{
                    // continue 
                    
                    $currentRound = getCurrentRound($conn,$gameId,$eventId);
                    $nextRound = getCurrentRound($conn,$gameId,$eventId) + 1;
        
                 
                        // winner bracket
                        
                         // participants array
                         $thisRoundMatchesArr = [];
                        // call natu ang function para ma store ang winner participants!
                         
                         getThisRoundWinnerIdsWithSingleAndDoubleCategoryForSEG($conn,$eventId,$gameId,$thisRoundMatchesArr,$gameType);
                         
                        
        
                         $participants = count($thisRoundMatchesArr);
        
                         if($participants % 2 == 0){
        
                                // if walay na bilin sa teams
        
                                $teamOneId = 0;
                                $teamTwoId = 0;
        
                                $roundValue = getCurrentRound($conn,$gameId,$eventId) + 1;
                                $lastScoreId = getNextIdOfMatchToBeUpdated($conn,$eventId,$gameId);
                              
                                
        
                                for($i = 0; $i < $participants; $i += 2){
                                    
                                    $lastScoreId += 1;
        
                                    $teamOneId = $thisRoundMatchesArr[$i];
                                    $teamTwoId = $thisRoundMatchesArr[$i + 1];
                                    
                                    generateMatchWithSingleAndDoubleCategory($conn,$eventId,$gameId,$teamOneId,$teamTwoId,$lastScoreId,$roundValue,$gameType);
                                    
                                    
                                    // clear teamOneId and teamTwoId
                                    $teamOneId = 0;
                                    $teamTwoId = 0;
                                        
                                }
                                  
        
                                backToGameList($eventId,$gameId,$gameType);
        
                         }else{
        
                            // if naay bungkig ang teams
        
                            $lastTeamId = $thisRoundMatchesArr[$participants - 1]; 
        
                            $teamOneId = 0;
                            $teamTwoId = 0;
        
                            $roundValue = getCurrentRound($conn,$gameId,$eventId) + 1;
                            $lastScoreId = getNextIdOfMatchToBeUpdated($conn,$eventId,$gameId);
                          
                            
        
                            for($i = 0; $i < $participants - 1; $i += 2){
                                
                                $lastScoreId += 1;
        
                                $teamOneId = $thisRoundMatchesArr[$i];
                                $teamTwoId = $thisRoundMatchesArr[$i + 1];
                                
                                generateMatchWithSingleAndDoubleCategory($conn,$eventId,$gameId,$teamOneId,$teamTwoId,$lastScoreId,$roundValue,$gameType);
                                   
                                // clear teamOneId and teamTwoId
                                $teamOneId = 0;
                                $teamTwoId = 0;
                                    
                            }
        
                            // e geenrate and last na bungkig na match
                            $lastScoreId += 1;
                            
                            generateHalfMatchWithSingleAndDoubleCategory($conn,$eventId,$gameId,$lastTeamId,$roundValue,$lastScoreId,$gameType);
                         
                            
                            backToGameList($eventId,$gameId,$gameType);
        
        
        
                         }
                        
        
                    
               }
               
    
    
        }

        // end sa singles

    }else{
        // doubles
        
        if($bye == true){

            // if naay bye
            $sql = "SELECT * FROM game_matches WHERE event_id = $eventId AND game_id = $gameId AND (match_info = 'BYE' OR status = 'SCORE') ORDER BY id DESC";
            $query = mysqli_query($conn, $sql);
    
            $teamId = [];
            $teamName = [];
            $teamName1 = [];
            $count = 0;
    
            $nextIdOfMatch = getNextIdOfMatchToBeUpdated($conn, $eventId, $gameId) + 1;
    
            while($test = mysqli_fetch_assoc($query)){
                if($test['match_info'] == 'BYE'){
                    $teamId[$count] = $test['team1'];
                    $teamName[$count] = $test['team1_name'];
                    $teamName1[$count] = $test['team1_name1'];
                }else {
                    if($test['team_one_score'] > $test['team_two_score']){
                        $teamId[$count] = $test['team1'];
                        $teamName[$count] = $test['team1_name'];
                        $teamName1[$count] = $test['team1_name1'];
    
                        
                    } else {
                        $teamId[$count] = $test['team2'];
                        $teamName[$count] = $test['team2_name'];
                        $teamName1[$count] = $test['team2_name2'];
    
                       
                    }
                }
    
                $count++;
    
                if($count == 2){
                  
    
                    $sqlForUpdate = "UPDATE game_matches SET team1 = $teamId[0], team1_name = '$teamName[0]',team1_1 = $teamId[0], team1_name1 = '$teamName1[0]', team2 = $teamId[1], team2_name = '$teamName[1]', team2_2 = $teamId[1], team2_name2 = '$teamName1[1]', status = 'game', round = 2 WHERE id = $nextIdOfMatch";
                    mysqli_query($conn, $sqlForUpdate);
    
                  
                    if(mysqli_affected_rows($conn) > 0){
                        echo "Next match updated successfully.<br>";
                    } else {
                        echo "Failed to update next match.<br>";
                    }
    
                    echo 'id = ' .$nextIdOfMatch . '<br>';
                    echo 'round = '.$newRound . '<br>';
    
                    echo 'teamId1 = '. $teamId[0] . '<br>';
                    echo 'teamName1 = '. $teamName[0] . '<br>';
                    echo 'teamId2 = '. $teamId[1] . '<br>';
                    echo 'teamName2 = '.$teamName[1] . '<br>';
    
                    // Reset the arrays and count for the next pair
                    $teamId = [];
                    $teamName = [];
                    $count = 0;
    
                    // Move to the next match ID
                    $nextIdOfMatch++;
                }
            }
    
            $deleteBye = "DELETE FROM game_matches WHERE game_id = $gameId AND event_id = $eventId AND match_info = 'BYE'";
                if(mysqli_query($conn,$deleteBye)){
                    echo 'delete succesfully';
                }
    
            // Call the function para mo balik sa game list na page!
            backToGameList($eventId, $gameId, $gameType);
        } else {
            // if walay bye, add your logic for generating new rounds without byes here
        
               $sqlCheckTeams = "SELECT * FROM players WHERE game_id = $gameId AND event_id = $eventId AND lose_number <= 0";
               $queryCheckTeams = mysqli_query($conn,$sqlCheckTeams);
    
               $checkValue = 0;
    
               while($check = mysqli_fetch_assoc($queryCheckTeams)){
    
                    $checkValue += 1;

               }
    
               if($checkValue == 2){
    
                    $team_name = [];
                    $team_name_1 = [];
                    $team_id = [];
    
                   LastGamesWithSingleAndDoubleCategoryForSEG($conn,$eventId,$gameId,$team_name,$team_name_1,$team_id,$gameType); 
                  
                   
                     
                     $team_name1 = $team_name[0];
                     $team_name1_1 = $team_name_1[0];
                     $team_name2 = $team_name[1];
                     $team_name2_2 = $team_name_1[1];
                     $team1_id = $team_id[0];
                     $team2_id = $team_id[1];

                     echo 'team_name1: ' . $team_name1 . '<br>';
                    echo 'team_name1_1: ' . $team_name1_1 . '<br>';
                    echo 'team_name2: ' . $team_name2 . '<br>';
                    echo 'team_name2_2: ' . $team_name2_2 . '<br>';
                    echo 'team1_id: ' . $team1_id . '<br>';
                    echo 'team2_id: ' . $team2_id . '<br>';
    
                     $nextRound = getCurrentRound($conn,$gameId,$eventId) + 1;
                     $nextId = getNextIdOfMatchToBeUpdated($conn,$eventId,$gameId) + 1;
                     
                    
    
                    $sql = "UPDATE game_matches SET status = 'game', round = $nextRound, team1 = $team1_id, team1_name = '$team_name1',team1_1 = $team1_id, team1_name1 = '$team_name1_1', team2 = $team2_id, team2_name = '$team_name2', team2_2 = $team2_id, team2_name2 = '$team_name2_2' WHERE id = $nextId";
                    mysqli_query($conn,$sql);
    
                    backToGameList($eventId, $gameId, $gameType);
    
               }else if($checkValue == 1){  
    
                    $sql = "DELETE FROM game_matches WHERE event_id = $eventId AND game_id = $gameId AND status = ''";
                    mysqli_query($conn,$sql);
                    backToGameList($eventId, $gameId, $gameType);
    
    
               }else{
                    // continue 
                    $currentRound = getCurrentRound($conn,$gameId,$eventId);
                    $nextRound = getCurrentRound($conn,$gameId,$eventId) + 1;
        
                   
                        // winner bracket
                        
                         // participants array
                         $thisRoundMatchesArr = [];
                        // call natu ang function para ma store ang winner participants!
                        
                         getThisRoundWinnerIdsWithSingleAndDoubleCategoryForSEG($conn,$eventId,$gameId,$thisRoundMatchesArr,$gameType);
                         
                        
        
                         $participants = count($thisRoundMatchesArr);
        
                         if($participants % 2 == 0){
        
                                // if walay na bilin sa teams
        
                                $teamOneId = 0;
                                $teamTwoId = 0;
        
                                $roundValue = getCurrentRound($conn,$gameId,$eventId) + 1;
                                $lastScoreId = getNextIdOfMatchToBeUpdated($conn,$eventId,$gameId);
                              
                                
        
                                for($i = 0; $i < $participants; $i += 2){
                                    
                                    $lastScoreId += 1;
        
                                    $teamOneId = $thisRoundMatchesArr[$i];
                                    $teamTwoId = $thisRoundMatchesArr[$i + 1];
         
                                    generateMatchWithSingleAndDoubleCategory($conn,$eventId,$gameId,$teamOneId,$teamTwoId,$lastScoreId,$roundValue,$gameType);
                                    
                                    
                                    // clear teamOneId and teamTwoId
                                    $teamOneId = 0;
                                    $teamTwoId = 0;
                                        
                                }
                                  
        
                                backToGameList($eventId,$gameId,$gameType);
        
                         }else{
        
                            // if naay bungkig ang teams
        
                            $lastTeamId = $thisRoundMatchesArr[$participants - 1]; 
        
                            $teamOneId = 0;
                            $teamTwoId = 0;
        
                            $roundValue = getCurrentRound($conn,$gameId,$eventId) + 1;
                            $lastScoreId = getNextIdOfMatchToBeUpdated($conn,$eventId,$gameId);
                          
                            
        
                            for($i = 0; $i < $participants - 1; $i += 2){
                                
                                $lastScoreId += 1;
        
                                $teamOneId = $thisRoundMatchesArr[$i];
                                $teamTwoId = $thisRoundMatchesArr[$i + 1];

                                generateMatchWithSingleAndDoubleCategory($conn,$eventId,$gameId,$teamOneId,$teamTwoId,$lastScoreId,$roundValue,$gameType);
                                   
                                // clear teamOneId and teamTwoId
                                $teamOneId = 0;
                                $teamTwoId = 0;
                                    
                            }
        
                            // e geenrate and last na bungkig na match
                            $lastScoreId += 1;
                            generateHalfMatchWithSingleAndDoubleCategory($conn,$eventId,$gameId,$lastTeamId,$roundValue,$lastScoreId,$gameType);
                         
                            
                            backToGameList($eventId,$gameId,$gameType);
        
        
        
                         }
                        
        
                    
               }
               
    
    
        }

        // end sa doubles
    }
   
}

    // function para ma generate new round and matches
    function generateNewRoundWIthSingleAndDoubleCategory($conn,$eventId,$gameId,$bye,$gameType){

        if($gameType == 'Chess' || $gameType == 'Archery'){
            // singles
            if($bye == true){

                // if naay bye
                $sql = "SELECT * FROM game_matches WHERE event_id = $eventId AND game_id = $gameId AND (match_info = 'BYE' OR status = 'SCORE') ORDER BY id DESC";
                $query = mysqli_query($conn, $sql);
        
                $teamId = [];
                $teamName = [];
                $count = 0;
        
                $nextIdOfMatch = getNextIdOfMatchToBeUpdated($conn, $eventId, $gameId) + 1;
        
                while($test = mysqli_fetch_assoc($query)){
                    if($test['match_info'] == 'BYE'){
                        $teamId[$count] = $test['team1'];
                        $teamName[$count] = $test['team1_name'];
                    }else {
                        if($test['team_one_score'] > $test['team_two_score']){
                            $teamId[$count] = $test['team1'];
                            $teamName[$count] = $test['team1_name'];
        
                            
                        } else {
                            $teamId[$count] = $test['team2'];
                            $teamName[$count] = $test['team2_name'];
        
                           
                        }
                    }
        
                    $count++;
        
                    if($count == 2){
                      
        
                        $sqlForUpdate = "UPDATE game_matches SET team1 = $teamId[0], team1_name = '$teamName[0]', team2 = $teamId[1], team2_name = '$teamName[1]', status = 'game', round = 2 WHERE id = $nextIdOfMatch";
                        mysqli_query($conn, $sqlForUpdate);
        
                       
                        if(mysqli_affected_rows($conn) > 0){
                            echo "Next match updated successfully.<br>";
                        } else {
                            echo "Failed to update next match.<br>";
                        }
        
                        echo 'id = ' .$nextIdOfMatch . '<br>';
                        echo 'round = '.$newRound . '<br>';
        
                        echo 'teamId1 = '. $teamId[0] . '<br>';
                        echo 'teamName1 = '. $teamName[0] . '<br>';
                        echo 'teamId2 = '. $teamId[1] . '<br>';
                        echo 'teamName2 = '.$teamName[1] . '<br>';
        
                        // Reset the arrays and count for the next pair
                        $teamId = [];
                        $teamName = [];
                        $count = 0;
        
                        // Move to the next match ID
                        $nextIdOfMatch++;
                    }
                }
        
                $deleteBye = "DELETE FROM game_matches WHERE game_id = $gameId AND event_id = $eventId AND match_info = 'BYE'";
                    if(mysqli_query($conn,$deleteBye)){
                        echo 'delete succesfully';
                    }
        
                // Call the function para mo balik sa game list na page!
                backToGameList($eventId, $gameId, $gameType);
            } else {
                // if walay bye, add your logic for generating new rounds without byes here
                
                   $sqlCheckTeams = "SELECT * FROM players WHERE game_id = $gameId AND event_id = $eventId AND lose_number < 2";
                   $queryCheckTeams = mysqli_query($conn,$sqlCheckTeams);
        
                   $checkValue = 0;
        
                   while($check = mysqli_fetch_assoc($queryCheckTeams)){
        
                        $checkValue += 1;

                   }
        
                   if($checkValue == 2){
        
                        $team_name = [];
                        $team_name1 = [];
                        $team_id = [];
        
                        LastGamesWithSingleAndDoubleCategory($conn,$eventId,$gameId,$team_name,$team_name1,$team_id,$gameType); 
                       
                         
                         $team_name1 = $team_name[0];
                         $team_name2 = $team_name[1];
                         $team1_id = $team_id[0];
                         $team2_id = $team_id[1];
        
                         $nextRound = getCurrentRound($conn,$gameId,$eventId) + 1;
                         $nextId = getNextIdOfMatchToBeUpdated($conn,$eventId,$gameId) + 1;
        
                        $sql = "UPDATE game_matches SET status = 'game', round = $nextRound, team1 = $team1_id, team1_name = '$team_name1', team2 = $team2_id, team2_name = '$team_name2' WHERE id = $nextId";
                        mysqli_query($conn,$sql);
        
                        backToGameList($eventId, $gameId, $gameType);
        
                   }else if($checkValue == 1){  
        
                        $sql = "DELETE FROM game_matches WHERE event_id = $eventId AND game_id = $gameId AND status = ''";
                        mysqli_query($conn,$sql);
                        backToGameList($eventId, $gameId, $gameType);
        
        
                   }else{
                        // continue 
                        $currentRound = getCurrentRound($conn,$gameId,$eventId);
                        $nextRound = getCurrentRound($conn,$gameId,$eventId) + 1;
            
                        if($nextRound % 2 == 0){
                            // winner bracket
                            
                             // participants array
                             $thisRoundMatchesArr = [];
                            // call natu ang function para ma store ang winner participants!
                            getThisRoundWinnerIdsWithSingleAndDoubleCategory($conn,$eventId,$gameId,$thisRoundMatchesArr,$gameType);
                             
                            
            
                             $participants = count($thisRoundMatchesArr);
            
                             if($participants % 2 == 0){
            
                                    // if walay na bilin sa teams
            
                                    $teamOneId = 0;
                                    $teamTwoId = 0;
            
                                    $roundValue = getCurrentRound($conn,$gameId,$eventId) + 1;
                                    $lastScoreId = getNextIdOfMatchToBeUpdated($conn,$eventId,$gameId);
                                  
                                    
            
                                    for($i = 0; $i < $participants; $i += 2){
                                        
                                        $lastScoreId += 1;
            
                                        $teamOneId = $thisRoundMatchesArr[$i];
                                        $teamTwoId = $thisRoundMatchesArr[$i + 1];
            
                                        generateMatchWithSingleAndDoubleCategory($conn,$eventId,$gameId,$teamOneId,$teamTwoId,$lastScoreId,$roundValue,$gameType);
                                        
                                        
                                        // clear teamOneId and teamTwoId
                                        $teamOneId = 0;
                                        $teamTwoId = 0;
                                            
                                    }
                                      
            
                                    backToGameList($eventId,$gameId,$gameType);
            
                             }else{
            
                                // if naay bungkig ang teams
            
                                $lastTeamId = $thisRoundMatchesArr[$participants - 1]; 
            
                                $teamOneId = 0;
                                $teamTwoId = 0;
            
                                $roundValue = getCurrentRound($conn,$gameId,$eventId) + 1;
                                $lastScoreId = getNextIdOfMatchToBeUpdated($conn,$eventId,$gameId);
                              
                                
            
                                for($i = 0; $i < $participants - 1; $i += 2){
                                    
                                    $lastScoreId += 1;
            
                                    $teamOneId = $thisRoundMatchesArr[$i];
                                    $teamTwoId = $thisRoundMatchesArr[$i + 1];
            
                                    generateMatchWithSingleAndDoubleCategory($conn,$eventId,$gameId,$teamOneId,$teamTwoId,$lastScoreId,$roundValue,$gameType);
                                       
                                    // clear teamOneId and teamTwoId
                                    $teamOneId = 0;
                                    $teamTwoId = 0;
                                        
                                }
            
                                // e geenrate and last na bungkig na match
                                $lastScoreId += 1;
                                generateHalfMatchWithSingleAndDoubleCategory($conn,$eventId,$gameId,$lastTeamId,$roundValue,$lastScoreId,$gameType);
                             
                                
                                backToGameList($eventId,$gameId,$gameType);
            
            
            
                             }
                            
            
                        }else{
                            // loser bracket
                           
                                // participants array
                                $thisRoundMatchesArr = [];
                                // call natu ang function para ma store ang loser participants!
                                getThisRoundLoserIdsWithSingleAndDoubleCategory($conn,$eventId,$gameId,$thisRoundMatchesArr,$gameType);                               
                                  
                                $participants = count($thisRoundMatchesArr);
            
                                if($participants % 2 == 0){
            
                                    // if walay na bilin na teams 
            
                                    $teamOneId = 0;
                                    $teamTwoId = 0;
            
                                    $roundValue = getCurrentRound($conn,$gameId,$eventId) + 1;
                                    $lastScoreId = getNextIdOfMatchToBeUpdated($conn,$eventId,$gameId);
                                  
                                    
            
                                    for($i = 0; $i < $participants; $i += 2){
                                        
                                        $lastScoreId += 1;
            
                                        $teamOneId = $thisRoundMatchesArr[$i];
                                        $teamTwoId = $thisRoundMatchesArr[$i + 1];
            
                                        generateMatchWithSingleAndDoubleCategory($conn,$eventId,$gameId,$teamOneId,$teamTwoId,$lastScoreId,$roundValue,$gameType);
                                        
                                        // clear teamOneId and teamTwoId
                                        $teamOneId = 0;
                                        $teamTwoId = 0;
                                            
                                    }
                                      
            
                                    backToGameList($eventId,$gameId,$gameType);
            
                                }else{
                                        // if naay nabilin usa na teams 
            
                                        $lastTeamId = $thisRoundMatchesArr[$participants - 1]; 
            
                                    $teamOneId = 0;
                                    $teamTwoId = 0;
            
                                    $roundValue = getCurrentRound($conn,$gameId,$eventId) + 1;
                                    $lastScoreId = getNextIdOfMatchToBeUpdated($conn,$eventId,$gameId);
                                  
                                    
            
                                    for($i = 0; $i < $participants - 1; $i += 2){
                                        
                                        $lastScoreId += 1;
            
                                        $teamOneId = $thisRoundMatchesArr[$i];
                                        $teamTwoId = $thisRoundMatchesArr[$i + 1];
            
                                        generateMatchWithSingleAndDoubleCategory($conn,$eventId,$gameId,$teamOneId,$teamTwoId,$lastScoreId,$roundValue,$gameType);
                                        
                                        // clear teamOneId and teamTwoId
                                        $teamOneId = 0;
                                        $teamTwoId = 0;
                                            
                                    }
            
                                    // e geenrate and last na bungkig na match
                                    $lastScoreId += 1;
                                    generateHalfMatchWithSingleAndDoubleCategory($conn,$eventId,$gameId,$lastTeamId,$roundValue,$lastScoreId,$gameType);
                                    
                                    backToGameList($eventId,$gameId,$gameType);
            
            
            
                                }
            
                            
                            
                        }
                   }
                   
        
        
            }

            // end sa singles

        }else{
            // doubles
            
            if($bye == true){

                // if naay bye
                $sql = "SELECT * FROM game_matches WHERE event_id = $eventId AND game_id = $gameId AND (match_info = 'BYE' OR status = 'SCORE') ORDER BY id DESC";
                $query = mysqli_query($conn, $sql);
        
                $teamId = [];
                $teamName = [];
                $teamName1 = [];
                $count = 0;
        
                $nextIdOfMatch = getNextIdOfMatchToBeUpdated($conn, $eventId, $gameId) + 1;
        
                while($test = mysqli_fetch_assoc($query)){
                    if($test['match_info'] == 'BYE'){
                        $teamId[$count] = $test['team1'];
                        $teamName[$count] = $test['team1_name'];
                        $teamName1[$count] = $test['team1_name1'];
                    }else {
                        if($test['team_one_score'] > $test['team_two_score']){
                            $teamId[$count] = $test['team1'];
                            $teamName[$count] = $test['team1_name'];
                            $teamName1[$count] = $test['team1_name1'];
        
                            
                        } else {
                            $teamId[$count] = $test['team2'];
                            $teamName[$count] = $test['team2_name'];
                            $teamName1[$count] = $test['team2_name2'];
        
                           
                        }
                    }
        
                    $count++;
        
                    if($count == 2){
                      
        
                        $sqlForUpdate = "UPDATE game_matches SET team1 = $teamId[0], team1_name = '$teamName[0]',team1_1 = $teamId[0], team1_name1 = '$teamName1[0]', team2 = $teamId[1], team2_name = '$teamName[1]', team2_2 = $teamId[1], team2_name2 = '$teamName1[1]', status = 'game', round = 2 WHERE id = $nextIdOfMatch";
                        mysqli_query($conn, $sqlForUpdate);
        
                      
                        if(mysqli_affected_rows($conn) > 0){
                            echo "Next match updated successfully.<br>";
                        } else {
                            echo "Failed to update next match.<br>";
                        }
        
                        echo 'id = ' .$nextIdOfMatch . '<br>';
                        echo 'round = '.$newRound . '<br>';
        
                        echo 'teamId1 = '. $teamId[0] . '<br>';
                        echo 'teamName1 = '. $teamName[0] . '<br>';
                        echo 'teamId2 = '. $teamId[1] . '<br>';
                        echo 'teamName2 = '.$teamName[1] . '<br>';
        
                        // Reset the arrays and count for the next pair
                        $teamId = [];
                        $teamName = [];
                        $count = 0;
        
                        // Move to the next match ID
                        $nextIdOfMatch++;
                    }
                }
        
                $deleteBye = "DELETE FROM game_matches WHERE game_id = $gameId AND event_id = $eventId AND match_info = 'BYE'";
                    if(mysqli_query($conn,$deleteBye)){
                        echo 'delete succesfully';
                    }
        
                // Call the function para mo balik sa game list na page!
                backToGameList($eventId, $gameId, $gameType);
            } else {
                // if walay bye, add your logic for generating new rounds without byes here
             
                   $sqlCheckTeams = "SELECT * FROM players WHERE game_id = $gameId AND event_id = $eventId AND lose_number < 2";
                   $queryCheckTeams = mysqli_query($conn,$sqlCheckTeams);
        
                   $checkValue = 0;
        
                   while($check = mysqli_fetch_assoc($queryCheckTeams)){
        
                        $checkValue += 1;

                   }
        
                   if($checkValue == 2){
        
                        $team_name = [];
                        $team_name_1 = [];
                        $team_id = [];
        
                        LastGamesWithSingleAndDoubleCategory($conn,$eventId,$gameId,$team_name,$team_name_1,$team_id,$gameType); 
                      
                       
                         
                         $team_name1 = $team_name[0];
                         $team_name1_1 = $team_name_1[0];
                         $team_name2 = $team_name[1];
                         $team_name2_2 = $team_name_1[1];
                         $team1_id = $team_id[0];
                         $team2_id = $team_id[1];

                         echo 'team_name1: ' . $team_name1 . '<br>';
                        echo 'team_name1_1: ' . $team_name1_1 . '<br>';
                        echo 'team_name2: ' . $team_name2 . '<br>';
                        echo 'team_name2_2: ' . $team_name2_2 . '<br>';
                        echo 'team1_id: ' . $team1_id . '<br>';
                        echo 'team2_id: ' . $team2_id . '<br>';
        
                         $nextRound = getCurrentRound($conn,$gameId,$eventId) + 1;
                         $nextId = getNextIdOfMatchToBeUpdated($conn,$eventId,$gameId) + 1;
                         
                        
        
                        $sql = "UPDATE game_matches SET status = 'game', round = $nextRound, team1 = $team1_id, team1_name = '$team_name1',team1_1 = $team1_id, team1_name1 = '$team_name1_1', team2 = $team2_id, team2_name = '$team_name2', team2_2 = $team2_id, team2_name2 = '$team_name2_2' WHERE id = $nextId";
                        mysqli_query($conn,$sql);
        
                        backToGameList($eventId, $gameId, $gameType);
        
                   }else if($checkValue == 1){  
        
                        $sql = "DELETE FROM game_matches WHERE event_id = $eventId AND game_id = $gameId AND status = ''";
                        mysqli_query($conn,$sql);
                        backToGameList($eventId, $gameId, $gameType);
        
        
                   }else{
                        // continue 
                        $currentRound = getCurrentRound($conn,$gameId,$eventId);
                        $nextRound = getCurrentRound($conn,$gameId,$eventId) + 1;
            
                        if($nextRound % 2 == 0){
                            // winner bracket
                            
                             // participants array
                             $thisRoundMatchesArr = [];
                            // call natu ang function para ma store ang winner participants!
                            getThisRoundWinnerIdsWithSingleAndDoubleCategory($conn,$eventId,$gameId,$thisRoundMatchesArr,$gameType);
                             
                            
            
                             $participants = count($thisRoundMatchesArr);
            
                             if($participants % 2 == 0){
            
                                    // if walay na bilin sa teams
            
                                    $teamOneId = 0;
                                    $teamTwoId = 0;
            
                                    $roundValue = getCurrentRound($conn,$gameId,$eventId) + 1;
                                    $lastScoreId = getNextIdOfMatchToBeUpdated($conn,$eventId,$gameId);
                                  
                                    
            
                                    for($i = 0; $i < $participants; $i += 2){
                                        
                                        $lastScoreId += 1;
            
                                        $teamOneId = $thisRoundMatchesArr[$i];
                                        $teamTwoId = $thisRoundMatchesArr[$i + 1];
            
                                        generateMatchWithSingleAndDoubleCategory($conn,$eventId,$gameId,$teamOneId,$teamTwoId,$lastScoreId,$roundValue,$gameType);
                                        
                                        
                                        // clear teamOneId and teamTwoId
                                        $teamOneId = 0;
                                        $teamTwoId = 0;
                                            
                                    }
                                      
            
                                    backToGameList($eventId,$gameId,$gameType);
            
                             }else{
            
                                // if naay bungkig ang teams
            
                                $lastTeamId = $thisRoundMatchesArr[$participants - 1]; 
            
                                $teamOneId = 0;
                                $teamTwoId = 0;
            
                                $roundValue = getCurrentRound($conn,$gameId,$eventId) + 1;
                                $lastScoreId = getNextIdOfMatchToBeUpdated($conn,$eventId,$gameId);
                              
                                
            
                                for($i = 0; $i < $participants - 1; $i += 2){
                                    
                                    $lastScoreId += 1;
            
                                    $teamOneId = $thisRoundMatchesArr[$i];
                                    $teamTwoId = $thisRoundMatchesArr[$i + 1];
            
                                    generateMatchWithSingleAndDoubleCategory($conn,$eventId,$gameId,$teamOneId,$teamTwoId,$lastScoreId,$roundValue,$gameType);
                                       
                                    // clear teamOneId and teamTwoId
                                    $teamOneId = 0;
                                    $teamTwoId = 0;
                                        
                                }
            
                                // e geenrate and last na bungkig na match
                                $lastScoreId += 1;
                                generateHalfMatchWithSingleAndDoubleCategory($conn,$eventId,$gameId,$lastTeamId,$roundValue,$lastScoreId,$gameType);
                             
                                
                                backToGameList($eventId,$gameId,$gameType);
            
            
            
                             }
                            
            
                        }else{
                            // loser bracket
                           
                                // participants array
                                $thisRoundMatchesArr = [];
                                // call natu ang function para ma store ang loser participants!
                                getThisRoundLoserIdsWithSingleAndDoubleCategory($conn,$eventId,$gameId,$thisRoundMatchesArr,$gameType);                               
                                  
                                $participants = count($thisRoundMatchesArr);
            
                                if($participants % 2 == 0){
            
                                    // if walay na bilin na teams 
            
                                    $teamOneId = 0;
                                    $teamTwoId = 0;
            
                                    $roundValue = getCurrentRound($conn,$gameId,$eventId) + 1;
                                    $lastScoreId = getNextIdOfMatchToBeUpdated($conn,$eventId,$gameId);
                                  
                                    
            
                                    for($i = 0; $i < $participants; $i += 2){
                                        
                                        $lastScoreId += 1;
            
                                        $teamOneId = $thisRoundMatchesArr[$i];
                                        $teamTwoId = $thisRoundMatchesArr[$i + 1];
            
                                        generateMatchWithSingleAndDoubleCategory($conn,$eventId,$gameId,$teamOneId,$teamTwoId,$lastScoreId,$roundValue,$gameType);
                                       
                                        // clear teamOneId and teamTwoId
                                        $teamOneId = 0;
                                        $teamTwoId = 0;
                                            
                                    }
                                      
            
                                    backToGameList($eventId,$gameId,$gameType);
            
                                }else{
                                        // if naay nabilin usa na teams 
            
                                        $lastTeamId = $thisRoundMatchesArr[$participants - 1]; 
            
                                    $teamOneId = 0;
                                    $teamTwoId = 0;
            
                                    $roundValue = getCurrentRound($conn,$gameId,$eventId) + 1;
                                    $lastScoreId = getNextIdOfMatchToBeUpdated($conn,$eventId,$gameId);
                                  
                                    
            
                                    for($i = 0; $i < $participants - 1; $i += 2){
                                        
                                        $lastScoreId += 1;
            
                                        $teamOneId = $thisRoundMatchesArr[$i];
                                        $teamTwoId = $thisRoundMatchesArr[$i + 1];
            
                                        generateMatchWithSingleAndDoubleCategory($conn,$eventId,$gameId,$teamOneId,$teamTwoId,$lastScoreId,$roundValue,$gameType);
                                        
                                        // clear teamOneId and teamTwoId
                                        $teamOneId = 0;
                                        $teamTwoId = 0;
                                            
                                    }
            
                                    // e geenrate and last na bungkig na match
                                    $lastScoreId += 1;
                                    generateHalfMatchWithSingleAndDoubleCategory($conn,$eventId,$gameId,$lastTeamId,$roundValue,$lastScoreId,$gameType);
                                    
                                    backToGameList($eventId,$gameId,$gameType);
            
            
            
                                }
            
                            
                            
                        }
                   }
                   
        
        
            }

            // end sa doubles
        }
       
    }
    

    // function for last games with single and double category
    function LastGamesWithSingleAndDoubleCategoryForSEG($conn,$eventId,$gameId,&$team_name,&$team_name_1,&$team_id,$gameType){
       
        if($gameType == 'Chess' || $gameType == 'Archery'){
            // singles
           
            $sql = "SELECT * FROM players WHERE event_id = $eventId AND game_id = $gameId AND lose_number <= 0";
            $query = mysqli_query($conn,$sql);
            
            while($getResult = mysqli_fetch_assoc($query)){
                    $team_name[] = $getResult['name'];
                    $team_id[] = $getResult['id'];
            }

        }else{
            // doubles
            $sql = "SELECT * FROM players WHERE event_id = $eventId AND game_id = $gameId AND lose_number <= 0";
            $query = mysqli_query($conn,$sql);
            
            while($getResult = mysqli_fetch_assoc($query)){
                    $team_name[] = $getResult['name'];
                    $team_name_1[] = $getResult['name1'];
                    $team_id[] = $getResult['id'];
            }

        }

      
    }

     // function for last games with single and double category
     function LastGamesWithSingleAndDoubleCategory($conn,$eventId,$gameId,&$team_name,&$team_name_1,&$team_id,$gameType){

        if($gameType == 'Chess' || $gameType == 'Archery'){
            // singles

            $sql = "SELECT * FROM players WHERE event_id = $eventId AND game_id = $gameId AND lose_number < 2";
            $query = mysqli_query($conn,$sql);
            
            while($getResult = mysqli_fetch_assoc($query)){
                    $team_name[] = $getResult['name'];
                    $team_id[] = $getResult['id'];
            }

        }else{
            // doubles
            $sql = "SELECT * FROM players WHERE event_id = $eventId AND game_id = $gameId AND lose_number < 2";
            $query = mysqli_query($conn,$sql);
            
            while($getResult = mysqli_fetch_assoc($query)){
                    $team_name[] = $getResult['name'];
                    $team_name_1[] = $getResult['name1'];
                    $team_id[] = $getResult['id'];
            }

        }

      
    }

     // function para ma ma butang ang mga value sa winner team sa array with single and double category
     function getThisRoundWinnerIdsWithSingleAndDoubleCategoryForSEG($conn, $eventId, $gameId, &$thisRoundMatchesArr,$gameType) {

        if($gameType == 'Chess' || $gameType == 'Archery'){
            // singles
                $sql = "SELECT * FROM players pl JOIN game_matches gm ON pl.id = gm.winner_id WHERE pl.event_id = $eventId AND pl.game_id = $gameId AND gm.event_id = $eventId AND gm.game_id = $gameId AND ( pl.bracket = 'W' AND pl.lose_number <= 0)";
                $query = mysqli_query($conn, $sql);
                
                while ($getResult = mysqli_fetch_assoc($query)) {
                    $winnerId = $getResult['winner_id'];
                    // Check if the winner ID is already in the array to avoid duplicates
                    if (!in_array($winnerId, $thisRoundMatchesArr)) {
                        $thisRoundMatchesArr[] = $winnerId;
                    }
                }
        }else{
            // doubles

            $sql = "SELECT * FROM players pl JOIN game_matches gm ON pl.id = gm.winner_id WHERE pl.event_id = $eventId AND pl.game_id = $gameId AND gm.event_id = $eventId AND gm.game_id = $gameId AND ( pl.bracket = 'W' AND pl.lose_number <= 0)";
            $query = mysqli_query($conn, $sql);
            
            while ($getResult = mysqli_fetch_assoc($query)) {
                $winnerId = $getResult['winner_id'];
                // Check if the winner ID is already in the array to avoid duplicates
                if (!in_array($winnerId, $thisRoundMatchesArr)) {
                    $thisRoundMatchesArr[] = $winnerId;
                }
            }
        }
        
    }

     // function para ma ma butang ang mga value sa winner team sa array with single and double category
     function getThisRoundWinnerIdsWithSingleAndDoubleCategory($conn, $eventId, $gameId, &$thisRoundMatchesArr,$gameType) {

        if($gameType == 'Chess' || $gameType == 'Archery'){
            // singles
                $sql = "SELECT * FROM players pl JOIN game_matches gm ON pl.id = gm.winner_id WHERE pl.event_id = $eventId AND pl.game_id = $gameId AND gm.event_id = $eventId AND gm.game_id = $gameId AND ( pl.bracket = 'W' AND pl.lose_number < 2)";
                $query = mysqli_query($conn, $sql);
                
                while ($getResult = mysqli_fetch_assoc($query)) {
                    $winnerId = $getResult['winner_id'];
                    // Check if the winner ID is already in the array to avoid duplicates
                    if (!in_array($winnerId, $thisRoundMatchesArr)) {
                        $thisRoundMatchesArr[] = $winnerId;
                    }
                }
        }else{
            // doubles

            $sql = "SELECT * FROM players pl JOIN game_matches gm ON pl.id = gm.winner_id WHERE pl.event_id = $eventId AND pl.game_id = $gameId AND gm.event_id = $eventId AND gm.game_id = $gameId AND ( pl.bracket = 'W' AND pl.lose_number < 2)";
            $query = mysqli_query($conn, $sql);
            
            while ($getResult = mysqli_fetch_assoc($query)) {
                $winnerId = $getResult['winner_id'];
                // Check if the winner ID is already in the array to avoid duplicates
                if (!in_array($winnerId, $thisRoundMatchesArr)) {
                    $thisRoundMatchesArr[] = $winnerId;
                }
            }
        }
        
    }


    // function para ma generate ang match with single and double category
    function generateMatchWithSingleAndDoubleCategory($conn,$eventId,$gameId,$teamOneId,$teamTwoId,$lastScoreId,$roundValue,$gameType){

        if($gameType == 'Chess' || $gameType == 'Archery'){
            // singles
            $sqlgetData1 = "SELECT * FROM players WHERE event_id = $eventId AND game_id = $gameId AND id = $teamOneId";
            $query1 = mysqli_query($conn,$sqlgetData1);
            $result1 = mysqli_fetch_assoc($query1);
            
            $name1 = $result1['name'];
    
            $sqlgetData2 = "SELECT * FROM players WHERE event_id = $eventId AND game_id = $gameId AND id = $teamTwoId";
            $query2 = mysqli_query($conn,$sqlgetData2);
            $result2 = mysqli_fetch_assoc($query2);
            
            $name2 = $result2['name'];
    
    
            $sql = "UPDATE game_matches SET status = 'game', round = $roundValue, team1 = $teamOneId, team1_name = '$name1', team2 = $teamTwoId, team2_name = '$name2' WHERE game_id = $gameId AND event_id = $eventId AND id = $lastScoreId";
            mysqli_query($conn,$sql);
        }else{
            // doubles
            $sqlgetData1 = "SELECT * FROM players WHERE event_id = $eventId AND game_id = $gameId AND id = $teamOneId";
            $query1 = mysqli_query($conn,$sqlgetData1);
            $result1 = mysqli_fetch_assoc($query1);
            
            $name1 = $result1['name'];
            $name1_1 = $result1['name1'];
    
            $sqlgetData2 = "SELECT * FROM players WHERE event_id = $eventId AND game_id = $gameId AND id = $teamTwoId";
            $query2 = mysqli_query($conn,$sqlgetData2);
            $result2 = mysqli_fetch_assoc($query2);
            
            $name2 = $result2['name'];
            $name2_2 = $result2['name1'];
    
    
            $sql = "UPDATE game_matches SET status = 'game', round = $roundValue, team1 = $teamOneId, team1_name = '$name1', team1_1 = $teamOneId, team1_name1 = '$name1_1', team2 = $teamTwoId, team2_name = '$name2', team2_2 = $teamTwoId, team2_name2 = '$name2_2' WHERE game_id = $gameId AND event_id = $eventId AND id = $lastScoreId";
            mysqli_query($conn,$sql);
        }

       
}

//function para generate sa bungkig na team with single and double category
function generateHalfMatchWithSingleAndDoubleCategory($conn,$eventId,$gameId,$lastTeamId,$roundValue,$lastScoreId,$gameType){

    if($gameType == 'Chess' || $gameType == 'Archery'){
        // singles
        $sqlgetData1 = "SELECT * FROM players WHERE event_id = $eventId AND game_id = $gameId AND id = $lastTeamId";
        $query1 = mysqli_query($conn,$sqlgetData1);
        $result1 = mysqli_fetch_assoc($query1);
        
        $name1 = $result1['name'];
        
        $sql = "UPDATE game_matches SET status = 'game', round = $roundValue, team1 = $lastTeamId, team1_name = '$name1', team2_name = 'PENDING' WHERE game_id = $gameId AND event_id = $eventId AND id = $lastScoreId";
        mysqli_query($conn,$sql);
    }else{
        // doubles
        $sqlgetData1 = "SELECT * FROM players WHERE event_id = $eventId AND game_id = $gameId AND id = $lastTeamId";
        $query1 = mysqli_query($conn,$sqlgetData1);
        $result1 = mysqli_fetch_assoc($query1);
        
        $name1 = $result1['name'];
        $name1_1 = $result1['name1'];
        
        $sql = "UPDATE game_matches SET status = 'game', round = $roundValue, team1 = $lastTeamId, team1_name = '$name1', team1_1 = $lastTeamId, team1_name1 = '$name1_1', team2_name = 'PENDING' WHERE game_id = $gameId AND event_id = $eventId AND id = $lastScoreId";
        mysqli_query($conn,$sql);

    }
   

    
}

// function para ma ma butang ang mga value sa loser team sa array with single and double category
function getThisRoundLoserIdsWithSingleAndDoubleCategory($conn,$eventId,$gameId,&$thisRoundMatchesArr,$gameType){

    $sql = "SELECT * FROM players pl JOIN game_matches gm ON pl.id = gm.loser_id WHERE pl.event_id = $eventId AND pl.game_id = $gameId AND gm.event_id = $eventId AND gm.game_id = $gameId AND ( (pl.bracket = 'L' AND pl.lose_number < 2) OR (pl.bracket = 'W' AND pl.last_match_status = 'Loser' AND pl.lose_number < 2) )";
    $query = mysqli_query($conn,$sql);
    
    while($getResult = mysqli_fetch_assoc($query)){
            $thisRoundMatchesArr[] = $getResult['loser_id'];
    }

}

    // function para ma check if need ba e update and current na match
    function specialMatchPending($conn,$eventId,$gameId,$id,$winnerId,$name){
        $nextId = $id + 1;
        $sql = "SELECT * FROM game_matches WHERE id = $nextId";
        $query = mysqli_query($conn,$sql);

        $result = mysqli_fetch_assoc($query);

        if($result['team2_name'] == 'PENDING'){
                
                $sqlUpdate = "UPDATE game_matches SET team2 = $winnerId, team2_name = '$name' WHERE id = $nextId";
                mysqli_query($conn,$sqlUpdate);

        }else{
            return null;
        }

    }

    // function ne para ma determine if loser or winner bracket sija
    function DetermineBracket($conn,$eventId,$gameId,$id,$condition){
            $sqlCheck = "SELECT * FROM teams WHERE event_id = $eventId AND game_id = $gameId and id = $id";
            $query = mysqli_query($conn,$sqlCheck);
            $result = mysqli_fetch_assoc($query);

            if($result['bracket_status'] == 1){
                return null;
            }else{
                    if($condition == 'Winner'){
                        $sqlUpdate = "UPDATE teams SET bracket = 'W', bracket_status = 1 WHERE id = $id";
                        mysqli_query($conn,$sqlUpdate);
                    }else{
                        $sqlUpdate = "UPDATE teams SET bracket = 'L', bracket_status = 1 WHERE id = $id";
                        mysqli_query($conn,$sqlUpdate);
                    }
            }
    }


    // function for checking / generateing round of byes or not
    function generateNewRoundForSEG($conn,$eventId,$gameId,$bye,$gameType){
        if($bye == true){
            // if naay bye
            $sql = "SELECT * FROM game_matches WHERE event_id = $eventId AND game_id = $gameId AND (match_info = 'BYE' OR status = 'SCORE') ORDER BY id DESC";
            $query = mysqli_query($conn, $sql);
    
            $teamId = [];
            $teamName = [];
            $count = 0;
    
            $nextIdOfMatch = getNextIdOfMatchToBeUpdated($conn, $eventId, $gameId) + 1;
    
            while($test = mysqli_fetch_assoc($query)){
                if($test['match_info'] == 'BYE'){
                    $teamId[$count] = $test['team1'];
                    $teamName[$count] = $test['team1_name'];
                } else {
                    if($test['team_one_score'] > $test['team_two_score']){
                        $teamId[$count] = $test['team1'];
                        $teamName[$count] = $test['team1_name'];
    
                        
                    } else {
                        $teamId[$count] = $test['team2'];
                        $teamName[$count] = $test['team2_name'];
    
                       
                    }
                }
    
                $count++;
    
                if($count == 2){
                  
    
                    $sqlForUpdate = "UPDATE game_matches SET team1 = $teamId[0], team1_name = '$teamName[0]', team2 = $teamId[1], team2_name = '$teamName[1]', status = 'game', round = 2 WHERE id = $nextIdOfMatch";
                    mysqli_query($conn, $sqlForUpdate);
    
                  
                    if(mysqli_affected_rows($conn) > 0){
                        echo "Next match updated successfully.<br>";
                    } else {
                        echo "Failed to update next match.<br>";
                    }
    
                    echo 'id = ' .$nextIdOfMatch . '<br>';
                    echo 'round = '.$newRound . '<br>';
    
                    echo 'teamId1 = '. $teamId[0] . '<br>';
                    echo 'teamName1 = '. $teamName[0] . '<br>';
                    echo 'teamId2 = '. $teamId[1] . '<br>';
                    echo 'teamName2 = '.$teamName[1] . '<br>';
    
                    // Reset the arrays and count for the next pair
                    $teamId = [];
                    $teamName = [];
                    $count = 0;
    
                    // Move to the next match ID
                    $nextIdOfMatch++;
                }
            }
    
            $deleteBye = "DELETE FROM game_matches WHERE game_id = $gameId AND event_id = $eventId AND match_info = 'BYE'";
                if(mysqli_query($conn,$deleteBye)){
                    echo 'delete succesfully';
                }
    
            // Call the function para mo balik sa game list na page!
            backToGameList($eventId, $gameId, $gameType);
        } else {
            // if walay bye, add your logic for generating new rounds without byes here
            
               $sqlCheckTeams = "SELECT * FROM teams WHERE game_id = $gameId AND event_id = $eventId AND lose_number <= 0";
               $queryCheckTeams = mysqli_query($conn,$sqlCheckTeams);
    
               $checkValue = 0;
    
               while($check = mysqli_fetch_assoc($queryCheckTeams)){
    
                    $checkValue += 1;
    
               }
    
               if($checkValue == 2){
    
                    $team_name = [];
                    $team_id = [];
                   
                    LastGamesForSEG($conn,$eventId,$gameId,$team_name,$team_id);
    
                     
                     $team_name1 = $team_name[0];
                     $team_name2 = $team_name[1];
                     $team1_id = $team_id[0];
                     $team2_id = $team_id[1];
    
                     $nextRound = getCurrentRound($conn,$gameId,$eventId) + 1;
                     $nextId = getNextIdOfMatchToBeUpdated($conn,$eventId,$gameId) + 1;
    
                    $sql = "UPDATE game_matches SET status = 'game', round = $nextRound, team1 = $team1_id, team1_name = '$team_name1', team2 = $team2_id, team2_name = '$team_name2' WHERE id = $nextId";
                    mysqli_query($conn,$sql);
    
                    backToGameList($eventId, $gameId, $gameType);
    
               }else if($checkValue == 1){  
    
                    $sql = "DELETE FROM game_matches WHERE event_id = $eventId AND game_id = $gameId AND status = ''";
                    mysqli_query($conn,$sql);
                    backToGameList($eventId, $gameId, $gameType);
    
    
               }else{
                    // continue 
                    $currentRound = getCurrentRound($conn,$gameId,$eventId);
                    $nextRound = getCurrentRound($conn,$gameId,$eventId) + 1;
        
                    if($nextRound % 2 == 0){
                        // winner bracket
                        
                         // participants array
                         $thisRoundMatchesArr = [];
                        // call natu ang function para ma store ang winner participants!
                         
                         getThisRoundWinnerIdsForSEG($conn,$eventId,$gameId,$thisRoundMatchesArr);
        
                         $participants = count($thisRoundMatchesArr);
        
                         if($participants % 2 == 0){
        
                                // if walay na bilin sa teams
        
                                $teamOneId = 0;
                                $teamTwoId = 0;
        
                                $roundValue = getCurrentRound($conn,$gameId,$eventId) + 1;
                                $lastScoreId = getNextIdOfMatchToBeUpdated($conn,$eventId,$gameId);
                              
                                
        
                                for($i = 0; $i < $participants; $i += 2){
                                    
                                    $lastScoreId += 1;
        
                                    $teamOneId = $thisRoundMatchesArr[$i];
                                    $teamTwoId = $thisRoundMatchesArr[$i + 1];
                                    
                                    generateMatch($conn,$eventId,$gameId,$teamOneId,$teamTwoId,$lastScoreId,$roundValue);
                                    
                                    // clear teamOneId and teamTwoId
                                    $teamOneId = 0;
                                    $teamTwoId = 0;
                                        
                                }
                                  
        
                                backToGameList($eventId,$gameId,$gameType);
        
                         }else{
        
                            // if naay bungkig ang teams
        
                            $lastTeamId = $thisRoundMatchesArr[$participants - 1]; 
        
                            $teamOneId = 0;
                            $teamTwoId = 0;
        
                            $roundValue = getCurrentRound($conn,$gameId,$eventId) + 1;
                            $lastScoreId = getNextIdOfMatchToBeUpdated($conn,$eventId,$gameId);
                          
                            
        
                            for($i = 0; $i < $participants - 1; $i += 2){
                                
                                $lastScoreId += 1;
        
                                $teamOneId = $thisRoundMatchesArr[$i];
                                $teamTwoId = $thisRoundMatchesArr[$i + 1];
                                
                                generateMatch($conn,$eventId,$gameId,$teamOneId,$teamTwoId,$lastScoreId,$roundValue);
                                
                                // clear teamOneId and teamTwoId
                                $teamOneId = 0;
                                $teamTwoId = 0;
                                    
                            }
        
                            // e geenrate and last na bungkig na match
                            $lastScoreId += 1;
                            
                            generateHalfMatch($conn,$eventId,$gameId,$lastTeamId,$roundValue,$lastScoreId);
                            
                            backToGameList($eventId,$gameId,$gameType);
        
        
        
                         }
                        
        
                    }
               }
               
    
    
        }
    }

    // function para ma generate new round and matches
function generateNewRound($conn,$eventId,$gameId,$bye,$gameType){
    if($bye == true){
        // if naay bye
        $sql = "SELECT * FROM game_matches WHERE event_id = $eventId AND game_id = $gameId AND (match_info = 'BYE' OR status = 'SCORE') ORDER BY id DESC";
        $query = mysqli_query($conn, $sql);

        $teamId = [];
        $teamName = [];
        $count = 0;

        $nextIdOfMatch = getNextIdOfMatchToBeUpdated($conn, $eventId, $gameId) + 1;

        while($test = mysqli_fetch_assoc($query)){
            if($test['match_info'] == 'BYE'){
                $teamId[$count] = $test['team1'];
                $teamName[$count] = $test['team1_name'];
            } else {
                if($test['team_one_score'] > $test['team_two_score']){
                    $teamId[$count] = $test['team1'];
                    $teamName[$count] = $test['team1_name'];

                    
                } else {
                    $teamId[$count] = $test['team2'];
                    $teamName[$count] = $test['team2_name'];

                   
                }
            }

            $count++;

            if($count == 2){
              

                $sqlForUpdate = "UPDATE game_matches SET team1 = $teamId[0], team1_name = '$teamName[0]', team2 = $teamId[1], team2_name = '$teamName[1]', status = 'game', round = 2 WHERE id = $nextIdOfMatch";
                mysqli_query($conn, $sqlForUpdate);

              
                if(mysqli_affected_rows($conn) > 0){
                    echo "Next match updated successfully.<br>";
                } else {
                    echo "Failed to update next match.<br>";
                }

                echo 'id = ' .$nextIdOfMatch . '<br>';
                echo 'round = '.$newRound . '<br>';

                echo 'teamId1 = '. $teamId[0] . '<br>';
                echo 'teamName1 = '. $teamName[0] . '<br>';
                echo 'teamId2 = '. $teamId[1] . '<br>';
                echo 'teamName2 = '.$teamName[1] . '<br>';

                // Reset the arrays and count for the next pair
                $teamId = [];
                $teamName = [];
                $count = 0;

                // Move to the next match ID
                $nextIdOfMatch++;
            }
        }

        $deleteBye = "DELETE FROM game_matches WHERE game_id = $gameId AND event_id = $eventId AND match_info = 'BYE'";
            if(mysqli_query($conn,$deleteBye)){
                echo 'delete succesfully';
            }

        // Call the function para mo balik sa game list na page!
        backToGameList($eventId, $gameId, $gameType);
    } else {
        // if walay bye, add your logic for generating new rounds without byes here
        
           $sqlCheckTeams = "SELECT * FROM teams WHERE game_id = $gameId AND event_id = $eventId AND lose_number < 2";
           $queryCheckTeams = mysqli_query($conn,$sqlCheckTeams);

           $checkValue = 0;

           while($check = mysqli_fetch_assoc($queryCheckTeams)){

                $checkValue += 1;

           }

           if($checkValue == 2){

                $team_name = [];
                $team_id = [];

                 LastGames($conn,$eventId,$gameId,$team_name,$team_id);

                 
                 $team_name1 = $team_name[0];
                 $team_name2 = $team_name[1];
                 $team1_id = $team_id[0];
                 $team2_id = $team_id[1];

                 $nextRound = getCurrentRound($conn,$gameId,$eventId) + 1;
                 $nextId = getNextIdOfMatchToBeUpdated($conn,$eventId,$gameId) + 1;

                $sql = "UPDATE game_matches SET status = 'game', round = $nextRound, team1 = $team1_id, team1_name = '$team_name1', team2 = $team2_id, team2_name = '$team_name2' WHERE id = $nextId";
                mysqli_query($conn,$sql);

                backToGameList($eventId, $gameId, $gameType);

           }else if($checkValue == 1){  

                $sql = "DELETE FROM game_matches WHERE event_id = $eventId AND game_id = $gameId AND status = ''";
                mysqli_query($conn,$sql);
                backToGameList($eventId, $gameId, $gameType);


           }else{
                // continue 
                $currentRound = getCurrentRound($conn,$gameId,$eventId);
                $nextRound = getCurrentRound($conn,$gameId,$eventId) + 1;
    
                if($nextRound % 2 == 0){
                    // winner bracket
                    
                     // participants array
                     $thisRoundMatchesArr = [];
                    // call natu ang function para ma store ang winner participants!
                     getThisRoundWinnerIds($conn,$eventId,$gameId,$thisRoundMatchesArr);
    
                     $participants = count($thisRoundMatchesArr);
    
                     if($participants % 2 == 0){
    
                            // if walay na bilin sa teams
    
                            $teamOneId = 0;
                            $teamTwoId = 0;
    
                            $roundValue = getCurrentRound($conn,$gameId,$eventId) + 1;
                            $lastScoreId = getNextIdOfMatchToBeUpdated($conn,$eventId,$gameId);
                          
                            
    
                            for($i = 0; $i < $participants; $i += 2){
                                
                                $lastScoreId += 1;
    
                                $teamOneId = $thisRoundMatchesArr[$i];
                                $teamTwoId = $thisRoundMatchesArr[$i + 1];
    
                                generateMatch($conn,$eventId,$gameId,$teamOneId,$teamTwoId,$lastScoreId,$roundValue);
                                
                                // clear teamOneId and teamTwoId
                                $teamOneId = 0;
                                $teamTwoId = 0;
                                    
                            }
                              
    
                            backToGameList($eventId,$gameId,$gameType);
    
                     }else{
    
                        // if naay bungkig ang teams
    
                        $lastTeamId = $thisRoundMatchesArr[$participants - 1]; 
    
                        $teamOneId = 0;
                        $teamTwoId = 0;
    
                        $roundValue = getCurrentRound($conn,$gameId,$eventId) + 1;
                        $lastScoreId = getNextIdOfMatchToBeUpdated($conn,$eventId,$gameId);
                      
                        
    
                        for($i = 0; $i < $participants - 1; $i += 2){
                            
                            $lastScoreId += 1;
    
                            $teamOneId = $thisRoundMatchesArr[$i];
                            $teamTwoId = $thisRoundMatchesArr[$i + 1];
    
                            generateMatch($conn,$eventId,$gameId,$teamOneId,$teamTwoId,$lastScoreId,$roundValue);
                            
                            // clear teamOneId and teamTwoId
                            $teamOneId = 0;
                            $teamTwoId = 0;
                                
                        }
    
                        // e geenrate and last na bungkig na match
                        $lastScoreId += 1;
                        generateHalfMatch($conn,$eventId,$gameId,$lastTeamId,$roundValue,$lastScoreId);
                        
                        backToGameList($eventId,$gameId,$gameType);
    
    
    
                     }
                    
    
                }else{
                    // loser bracket
                   
                        // participants array
                        $thisRoundMatchesArr = [];
                        // call natu ang function para ma store ang loser participants!
                        getThisRoundLoserIds($conn,$eventId,$gameId,$thisRoundMatchesArr); 
                          
                        $participants = count($thisRoundMatchesArr);
    
                        if($participants % 2 == 0){
    
                            // if walay na bilin na teams 
    
                            $teamOneId = 0;
                            $teamTwoId = 0;
    
                            $roundValue = getCurrentRound($conn,$gameId,$eventId) + 1;
                            $lastScoreId = getNextIdOfMatchToBeUpdated($conn,$eventId,$gameId);
                          
                            
    
                            for($i = 0; $i < $participants; $i += 2){
                                
                                $lastScoreId += 1;
    
                                $teamOneId = $thisRoundMatchesArr[$i];
                                $teamTwoId = $thisRoundMatchesArr[$i + 1];
    
                                generateMatch($conn,$eventId,$gameId,$teamOneId,$teamTwoId,$lastScoreId,$roundValue);
                                
                                // clear teamOneId and teamTwoId
                                $teamOneId = 0;
                                $teamTwoId = 0;
                                    
                            }
                              
    
                            backToGameList($eventId,$gameId,$gameType);
    
                        }else{
                                // if naay nabilin usa na teams 
    
                                $lastTeamId = $thisRoundMatchesArr[$participants - 1]; 
    
                            $teamOneId = 0;
                            $teamTwoId = 0;
    
                            $roundValue = getCurrentRound($conn,$gameId,$eventId) + 1;
                            $lastScoreId = getNextIdOfMatchToBeUpdated($conn,$eventId,$gameId);
                          
                            
    
                            for($i = 0; $i < $participants - 1; $i += 2){
                                
                                $lastScoreId += 1;
    
                                $teamOneId = $thisRoundMatchesArr[$i];
                                $teamTwoId = $thisRoundMatchesArr[$i + 1];
    
                                generateMatch($conn,$eventId,$gameId,$teamOneId,$teamTwoId,$lastScoreId,$roundValue);
                                
                                // clear teamOneId and teamTwoId
                                $teamOneId = 0;
                                $teamTwoId = 0;
                                    
                            }
    
                            // e geenrate and last na bungkig na match
                            $lastScoreId += 1;
                            generateHalfMatch($conn,$eventId,$gameId,$lastTeamId,$roundValue,$lastScoreId);
                            
                            backToGameList($eventId,$gameId,$gameType);
    
    
    
                        }
    
                    
                    
                }
           }
           


    }
}
    

    // function for last games
    function LastGames($conn,$eventId,$gameId,&$team_name,&$team_id){

        $sql = "SELECT * FROM teams WHERE event_id = $eventId AND game_id = $gameId AND lose_number < 2";
        $query = mysqli_query($conn,$sql);
        
        while($getResult = mysqli_fetch_assoc($query)){
                $team_name[] = $getResult['team_name'];
                $team_id[] = $getResult['id'];
        }
    }

     // function for last games For SEG 
     function LastGamesForSEG($conn,$eventId,$gameId,&$team_name,&$team_id){

        $sql = "SELECT * FROM teams WHERE event_id = $eventId AND game_id = $gameId AND lose_number <= 0";
        $query = mysqli_query($conn,$sql);
        
        while($getResult = mysqli_fetch_assoc($query)){
                $team_name[] = $getResult['team_name'];
                $team_id[] = $getResult['id'];
        }
    }

     // function para ma ma butang ang mga value sa winner team sa array
        function getThisRoundWinnerIds($conn, $eventId, $gameId, &$thisRoundMatchesArr) {
            $sql = "SELECT * FROM teams tm JOIN game_matches gm ON tm.id = gm.winner_id WHERE tm.event_id = $eventId AND tm.game_id = $gameId AND gm.event_id = $eventId AND gm.game_id = $gameId AND ( tm.bracket = 'W' AND tm.lose_number < 2)";
            $query = mysqli_query($conn, $sql);
            
            while ($getResult = mysqli_fetch_assoc($query)) {
                $winnerId = $getResult['winner_id'];
                // Check if the winner ID is already in the array to avoid duplicates
                if (!in_array($winnerId, $thisRoundMatchesArr)) {
                    $thisRoundMatchesArr[] = $winnerId;
                }
            }
        }

        // function para ma ma butang ang mga value sa winner team sa array for SEG
        function getThisRoundWinnerIdsForSEG($conn, $eventId, $gameId, &$thisRoundMatchesArr) {
            $sql = "SELECT * FROM teams tm JOIN game_matches gm ON tm.id = gm.winner_id WHERE tm.event_id = $eventId AND tm.game_id = $gameId AND gm.event_id = $eventId AND gm.game_id = $gameId AND ( tm.bracket = 'W' AND tm.lose_number <= 0)";
            $query = mysqli_query($conn, $sql);
            
            while ($getResult = mysqli_fetch_assoc($query)) {
                $winnerId = $getResult['winner_id'];
                // Check if the winner ID is already in the array to avoid duplicates
                if (!in_array($winnerId, $thisRoundMatchesArr)) {
                    $thisRoundMatchesArr[] = $winnerId;
                }
            }
        }


    //function para generate sa bungkig na team
    function generateHalfMatch($conn,$eventId,$gameId,$lastTeamId,$roundValue,$lastScoreId){
        $sqlgetData1 = "SELECT * FROM teams WHERE event_id = $eventId AND game_id = $gameId AND id = $lastTeamId";
        $query1 = mysqli_query($conn,$sqlgetData1);
        $result1 = mysqli_fetch_assoc($query1);
        
        $name1 = $result1['team_name'];
        
        $sql = "UPDATE game_matches SET status = 'game', round = $roundValue, team1 = $lastTeamId, team1_name = '$name1', team2_name = 'PENDING' WHERE game_id = $gameId AND event_id = $eventId AND id = $lastScoreId";
        mysqli_query($conn,$sql);

        
    }
    // function para ma generate ang match
    function generateMatch($conn,$eventId,$gameId,$teamOneId,$teamTwoId,$lastScoreId,$roundValue){

            $sqlgetData1 = "SELECT * FROM teams WHERE event_id = $eventId AND game_id = $gameId AND id = $teamOneId";
            $query1 = mysqli_query($conn,$sqlgetData1);
            $result1 = mysqli_fetch_assoc($query1);
            
            $name1 = $result1['team_name'];

            $sqlgetData2 = "SELECT * FROM teams WHERE event_id = $eventId AND game_id = $gameId AND id = $teamTwoId";
            $query2 = mysqli_query($conn,$sqlgetData2);
            $result2 = mysqli_fetch_assoc($query2);
            
            $name2 = $result2['team_name'];


            $sql = "UPDATE game_matches SET status = 'game', round = $roundValue, team1 = $teamOneId, team1_name = '$name1', team2 = $teamTwoId, team2_name = '$name2' WHERE game_id = $gameId AND event_id = $eventId AND id = $lastScoreId";
            mysqli_query($conn,$sql);
    }

    // function para ma ma butang ang mga value sa loser team sa array
    function getThisRoundLoserIds($conn,$eventId,$gameId,&$thisRoundMatchesArr){

            $sql = "SELECT * FROM teams tm JOIN game_matches gm ON tm.id = gm.loser_id WHERE tm.event_id = $eventId AND tm.game_id = $gameId AND gm.event_id = $eventId AND gm.game_id = $gameId AND ( (tm.bracket = 'L' AND tm.lose_number < 2) OR (tm.bracket = 'W' AND tm.last_match_status = 'Loser' AND tm.lose_number < 2) )";
            $query = mysqli_query($conn,$sql);
            
            while($getResult = mysqli_fetch_assoc($query)){
                    $thisRoundMatchesArr[] = $getResult['loser_id'];
            }

    }

    // function para kuhaon ang last id na nag score
    function getNextIdOfMatchToBeUpdated($conn,$eventId,$gameId){

        $sql = "SELECT id FROM game_matches WHERE status = 'SCORE' AND event_id = $eventId AND game_id = $gameId ORDER BY id DESC LIMIT 1";
        $query = mysqli_query($conn,$sql);
        $result = mysqli_fetch_assoc($query);

        return $result['id'];

    }
        

    // function to check if naay bye
    function checkIfByeExist($conn,$eventId,$gameId){
        $sql = "SELECT * FROM game_matches WHERE event_id = $eventId AND game_id = $gameId AND match_info = 'BYE'";
        $query = mysqli_query($conn,$sql);
        $bye = 0;

        while($test = mysqli_fetch_assoc($query)){
            $bye++;
        }

        if($bye == 0){
            return false;
        }else{
            return true;
        }

    }

    // function To Proceed Back To Game List
    function backToGameList($eventId,$gameId,$gameType){
        header('Location: game_list.php?event_id=' . urlencode($eventId) . '&game_id=' . urlencode($gameId) . '&game_type=' . urlencode($gameType));          
    }

    // function para ma know and current round
    function getCurrentRound($conn,$gameId,$eventId){
        $sql = "SELECT MAX(round) AS max_value FROM game_matches WHERE game_id = $gameId AND event_id = $eventId";
            $query = mysqli_query($conn,$sql);

            $result = mysqli_fetch_assoc($query);

            return $result['max_value'];
    }
    

    // function para ma detect if na scoran naba ang tanan na matches na ani na round
    function checkIfThereStillMatchesNotScoredInThisRound($conn,$gameId,$eventId,$currentRound){

            $sql = "SELECT * FROM game_matches WHERE game_id = $gameId AND event_id = $eventId AND round = $currentRound AND status = 'game'";
            $query = mysqli_query($conn,$sql);
            $value = 0;

            while($getValue = mysqli_fetch_assoc($query)){
                $value++;
            }

            if($value == 0){
                    return true;
            }else{
                return false;
            }

    }

?>
