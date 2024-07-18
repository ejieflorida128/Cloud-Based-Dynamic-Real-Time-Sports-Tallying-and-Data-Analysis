<?php
// new update code
// now ejie new 
session_start();
include('../connection/conn.php');

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $teamOneScore = isset($_POST['teamOneScore']) ? $_POST['teamOneScore'] : null;
            $teamTwoScore = isset($_POST['teamTwoScore']) ? $_POST['teamTwoScore'] : null;
            $teamOneName = isset($_POST['teamOneName']) ? $_POST['teamOneName'] : null;
            $teamTwoName = isset($_POST['teamTwoName']) ? $_POST['teamTwoName'] : null;
            $team1_id = isset($_POST['team1_id']) ? $_POST['team1_id'] : null;
            $team2_id = isset($_POST['team2_id']) ? $_POST['team2_id'] : null;
            $gameType = isset($_POST['game_type']) ? $_POST['game_type'] : null;
            $gameId = isset($_POST['game_id']) ? $_POST['game_id'] : null;
            $eventId = isset($_POST['event_id']) ? $_POST['event_id'] : null;
            $id = isset($_POST['id']) ? $_POST['id'] : null;

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

            }else if($gameType == 'Badminton_Single_Men' || $gameType == 'Badminton_Double_Men' || $gameType == 'Badminton_Single_Women' || $gameType == 'Badminton_Double_Women' || $gameType == 'Table_tennis_Single_Men' || $gameType == 'Table_tennis_Double_Men' || $gameType == 'Table_tennis_Single_Women' || $gameType == 'Table_tennis_Double_Women'){
                    // handle games like sa mga teams with player ang style like table tennis and badmnton 
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

                // Debug: Check if the update was successful
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
