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
        $type = isset($_POST['type']) ? $_POST['type'] : null;
        $EliType = isset($_POST['EliType']) ? $_POST['EliType'] : null;

       

        if ($type == 'single') {
            if ($teamOneScore > $teamTwoScore) {
                $winnerId = $team1_id;
                $loserId = $team2_id;
        
                // Update Winner using ID
                $sqlFOrWinner = "UPDATE players SET last_match_status = 'Winner', winner_number = winner_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND id = $winnerId";
                mysqli_query($conn, $sqlFOrWinner);
                DetermineBracketWinner($conn, $eventId, $gameId, $winnerId, "Winner", $gameType);
        
                // Update Loser using ID
                $sqlForLoser = "UPDATE players SET last_match_status = 'Loser', lose_number = lose_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND id = $loserId";
                mysqli_query($conn, $sqlForLoser);
                DetermineBracketLoser($conn, $eventId, $gameId, $loserId, "Loser", $gameType);
        
                specialMatchPending($conn, $eventId, $gameId, $id, $winnerId, $teamOneName, '', $gameType, $type);
        
            } else {
                $winnerId = $team2_id;
                $loserId = $team1_id;
        
                // Update Winner using ID
                $sqlFOrWinner = "UPDATE players SET last_match_status = 'Winner', winner_number = winner_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND id = $winnerId";
                mysqli_query($conn, $sqlFOrWinner);
                DetermineBracketWinner($conn, $eventId, $gameId, $winnerId, "Winner", $gameType);
        
                // Update Loser using ID
                $sqlForLoser = "UPDATE players SET last_match_status = 'Loser', lose_number = lose_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND id = $loserId";
                mysqli_query($conn, $sqlForLoser);
                DetermineBracketLoser($conn, $eventId, $gameId, $loserId, "Loser", $gameType);
        
                specialMatchPending($conn, $eventId, $gameId, $id, $winnerId, $teamTwoName, '', $gameType, $type);
            }
        } else { // If type is not 'single' (Doubles)
            if ($teamOneScore > $teamTwoScore) {
                $winnerId = $team1_id;
                $loserId = $team2_id;
        
                // Update Winner for Doubles using ID
                $sqlFOrWinner = "UPDATE players SET last_match_status = 'Winner', winner_number = winner_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND id = $winnerId";
                mysqli_query($conn, $sqlFOrWinner);
                DetermineBracketWinner($conn, $eventId, $gameId, $winnerId, "Winner", $gameType);
        
                // Update Loser for Doubles using ID
                $sqlForLoser = "UPDATE players SET last_match_status = 'Loser', lose_number = lose_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND id = $loserId";
                mysqli_query($conn, $sqlForLoser);
                DetermineBracketLoser($conn, $eventId, $gameId, $loserId, "Loser", $gameType);
        
                specialMatchPending($conn, $eventId, $gameId, $id, $winnerId, $teamOneName, '', $gameType, $type);
        
            } else {
                $winnerId = $team2_id;
                $loserId = $team1_id;
        
                // Update Winner for Doubles using ID
                $sqlFOrWinner = "UPDATE players SET last_match_status = 'Winner', winner_number = winner_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND id = $winnerId";
                mysqli_query($conn, $sqlFOrWinner);
                DetermineBracketWinner($conn, $eventId, $gameId, $winnerId, "Winner", $gameType);
        
                // Update Loser for Doubles using ID
                $sqlForLoser = "UPDATE players SET last_match_status = 'Loser', lose_number = lose_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND id = $loserId";
                mysqli_query($conn, $sqlForLoser);
                DetermineBracketLoser($conn, $eventId, $gameId, $loserId, "Loser", $gameType);
        
                specialMatchPending($conn, $eventId, $gameId, $id, $winnerId, $teamTwoName, '', $gameType, $type);
            }
        }
        
        

        $sqlUpdateOfWinnerAndLoserId = "UPDATE game_matches SET team_one_score = $teamOneScore, team_two_score = $teamTwoScore, winner_id = $winnerId, loser_id = $loserId, status = 'SCORE' WHERE id = $id";
        mysqli_query($conn,$sqlUpdateOfWinnerAndLoserId);



        if($EliType == 'SEG'){
                    if($type == 'single'){
                         generateSingleSEG($conn,$gameId,$eventId,$gameType,$id);
                    }else if($type == 'double'){
                        generateDoubleSEG($conn,$gameId,$eventId,$gameType,$id);

                    }
        }else if($EliType == 'DEG'){

            if($type == 'single'){
                generateSingleDEG($conn,$gameId,$eventId,$gameType,$id);
            }else if($type == 'double'){
                generateDoubleDEG($conn,$gameId,$eventId,$gameType,$id);
            }

        }else if($EliType == 'MSEG'){

            if($type == 'single'){

            }else if($type == 'double'){
                    

            }

        }

     
    }   



    function generateSingleDEG($conn,$gameId,$eventId,$gameType,$id){

        // call the function para ma kuha ang value sa current na round
        $currentRound = getCurrentRoundSingle($conn,$gameId,$eventId);

      
        // call the function para ma check if naa pay wala na score sa round 
        $checkRound = checkIfThereStillMatchesNotScoredInThisRoundSingle($conn,$gameId,$eventId,$currentRound);

        $number = $currentRound + 1;
        

        if($checkRound == false){       
            backToScore($eventId,$gameId,$gameType,'single');
        }else{
            // continue

            generateMatchSingleDEG($conn,$gameId,$eventId,$gameType,$id,$number);

        }

    }

    function generateDoubleDEG($conn,$gameId,$eventId,$gameType,$id){

        // call the function para ma kuha ang value sa current na round
        $currentRound = getCurrentRoundDouble($conn,$gameId,$eventId);

      
        // call the function para ma check if naa pay wala na score sa round 
        $checkRound = checkIfThereStillMatchesNotScoredInThisRoundDouble($conn,$gameId,$eventId,$currentRound);

        $number = $currentRound + 1;
        

        if($checkRound == false){       
            backToScore($eventId,$gameId,$gameType,'double');
        }else{
            // continue

            generateMatchDoubleDEG($conn,$gameId,$eventId,$gameType,$id,$number);

        }

    }

    function generateMatchSingleDEG($conn,$gameId,$eventId,$gameType,$id,$number){
        if($number == 2){
            // loser match
                $name = [];
                $id = [];

                $getLoser = "SELECT * FROM players WHERE game_id = '$gameId' AND event_id = '$eventId' AND player_number = 'player1' AND bracket = 'L'";
                $query = mysqli_query($conn,$getLoser);

                while($getNow = mysqli_fetch_assoc($query)){
                        $name[] = $getNow['name'];
                        $id[] = $getNow['id'];
                }
                

                $match_info = $number + 1;

                $update = "UPDATE game_matches SET status = 'game', round = '$number', team1 = '$id[0]', team1_name = '$name[0]', team2 = '$id[1]', team2_name = '$name[1]' WHERE match_info = '$match_info' AND game_id = '$gameId' AND event_id = '$eventId' AND type = 'single'";
                mysqli_query($conn,$update);

                // clear array
                $name = [];
                $id = [];



       }else if($number == 3){
            // winner match

            $name = [];
            $id = [];

            $getLoser = "SELECT * FROM players WHERE game_id = '$gameId' AND event_id = '$eventId' AND player_number = 'player1' AND bracket = 'W'";
            $query = mysqli_query($conn,$getLoser);

            while($getNow = mysqli_fetch_assoc($query)){
                    $name[] = $getNow['name'];
                    $id[] = $getNow['id'];
            }
            

            $match_info = $number + 1;

            $update = "UPDATE game_matches SET status = 'game', round = '$number', team1 = '$id[0]', team1_name = '$name[0]', team2 = '$id[1]', team2_name = '$name[1]' WHERE match_info = '$match_info' AND game_id = '$gameId' AND event_id = '$eventId' AND type = 'single'";
            mysqli_query($conn,$update);

            // clear array
            $name = [];
            $id = [];

       }else if($number == 4){
            // semi - finals

            $name = [];
            $id = [];

            $getLoser = "SELECT * FROM players WHERE game_id = '$gameId' AND event_id = '$eventId' AND player_number = 'player1' AND (bracket = 'W' AND last_match_status = 'Loser' AND lose_number < 2) OR (bracket = 'L' AND last_match_status = 'Winner' AND lose_number < 2)";
            $query = mysqli_query($conn,$getLoser);

            while($getNow = mysqli_fetch_assoc($query)){
                    $name[] = $getNow['name'];
                    $id[] = $getNow['id'];
            }
            

            $match_info = $number + 1;

            $update = "UPDATE game_matches SET status = 'game', round = '$number', team1 = '$id[0]', team1_name = '$name[0]', team2 = '$id[1]', team2_name = '$name[1]' WHERE match_info = '$match_info' AND game_id = '$gameId' AND event_id = '$eventId' AND type = 'single'";
            mysqli_query($conn,$update);

            // clear array
            $name = [];
            $id = [];

       }else if($number == 5){
            // finals

            $name = [];
            $id = [];

            $getLoser = "SELECT * FROM players WHERE game_id = '$gameId' AND event_id = '$eventId' AND player_number = 'player1' AND lose_number < 2";
            $query = mysqli_query($conn,$getLoser);

            while($getNow = mysqli_fetch_assoc($query)){
                    $name[] = $getNow['name'];
                    $id[] = $getNow['id'];
            }
            

            $match_info = $number + 1;

            $update = "UPDATE game_matches SET status = 'game', round = '$number', team1 = '$id[0]', team1_name = '$name[0]', team2 = '$id[1]', team2_name = '$name[1]' WHERE match_info = '$match_info' AND game_id = '$gameId' AND event_id = '$eventId' AND type = 'single'";
            mysqli_query($conn,$update);

            // clear array
            $name = [];
            $id = [];

       }else{
        backToScore($eventId,$gameId,$gameType,'single');
       }

       backToScore($eventId,$gameId,$gameType,'single');
    }

    function generateMatchDoubleDEG($conn,$gameId,$eventId,$gameType,$id,$number){
        if($number == 2){
            // loser match
                $name = [];
                $id = [];

                $name1 = [];
                $id1 = [];

                $getLoser = "SELECT * FROM players WHERE game_id = '$gameId' AND event_id = '$eventId' AND player_number = 'player2' AND bracket = 'L'";
                $query = mysqli_query($conn,$getLoser);

                while($getNow = mysqli_fetch_assoc($query)){
                        $name[] = $getNow['name'];
                        $id[] = $getNow['id'];

                        $name1[] = $getNow['name1'];
                        $id1[] = $getNow['id1'];
                }
                

                $match_info = $number + 1;

                $update = "UPDATE game_matches SET status = 'game', round = '$number', team1 = '$id[0]', team1_name = '$name[0]',team1_1 = '$id1[0]',team1_name1 = '$name1[0]', team2 = '$id[1]', team2_name = '$name[1]',team2_2 = '$id1[1]', team2_name2 = '$name1[1]' WHERE match_info = '$match_info' AND game_id = '$gameId' AND event_id = '$eventId' AND type = 'double'";
                mysqli_query($conn,$update);

                // clear array
                $name = [];
                $id = [];

                $name1 = [];
                $id1 = [];


       }else if($number == 3){
            // winner match

            $name = [];
            $id = [];

            $name1 = [];
            $id1 = [];

            $getLoser = "SELECT * FROM players WHERE game_id = '$gameId' AND event_id = '$eventId' AND player_number = 'player2' AND bracket = 'W'";
            $query = mysqli_query($conn,$getLoser);

            while($getNow = mysqli_fetch_assoc($query)){
                    $name[] = $getNow['name'];
                    $id[] = $getNow['id'];

                    $name1[] = $getNow['name1'];
                    $id1[] = $getNow['id1'];
            }
            

            $match_info = $number + 1;

            $update = "UPDATE game_matches SET status = 'game', round = '$number', team1 = '$id[0]', team1_name = '$name[0]', team1_1 = '$id1[0]', team1_name1 = '$name1[0]', team2 = '$id[1]', team2_name = '$name[1]', team2_2 = '$id1[1]', team2_name2 = '$name1[1]' WHERE match_info = '$match_info' AND game_id = '$gameId' AND event_id = '$eventId' AND type = 'double'";
            mysqli_query($conn,$update);

            // clear array
            $name = [];
            $id = [];

            $name1 = [];
            $id1 = [];
       }else if($number == 4){
            // semi - finals

            $name = [];
            $id = [];
            $name1 = [];
            $id1 = [];

            $getLoser = "SELECT * FROM players WHERE game_id = '$gameId' AND event_id = '$eventId' AND player_number = 'player2' AND (bracket = 'W' AND last_match_status = 'Loser' AND lose_number < 2) OR (bracket = 'L' AND last_match_status = 'Winner' AND lose_number < 2)";
            $query = mysqli_query($conn,$getLoser);

            while($getNow = mysqli_fetch_assoc($query)){
                    $name[] = $getNow['name'];
                    $id[] = $getNow['id'];

                    $name1[] = $getNow['name1'];
                    $id1[] = $getNow['id1'];
            }
            

            $match_info = $number + 1;

            $update = "UPDATE game_matches SET status = 'game', round = '$number', team1 = '$id[0]', team1_name = '$name[0]',team1_1 = '$id1[0]', team1_name1 = '$name1[0]', team2 = '$id[1]', team2_name = '$name[1]', team2_2 = '$id1[1]', team2_name2 = '$name1[1]' WHERE match_info = '$match_info' AND game_id = '$gameId' AND event_id = '$eventId' AND type = 'double'";
            mysqli_query($conn,$update);

            // clear array
            $name = [];
            $id = [];

            $name1 = [];
            $id1 = [];

       }else if($number == 5){
            // finals

            $name = [];
            $id = [];

            $name1 = [];
            $id1 = [];

            $getLoser = "SELECT * FROM players WHERE game_id = '$gameId' AND event_id = '$eventId' AND player_number = 'player2' AND lose_number < 2";
            $query = mysqli_query($conn,$getLoser);

            while($getNow = mysqli_fetch_assoc($query)){
                    $name[] = $getNow['name'];
                    $id[] = $getNow['id'];

                    $name1[] = $getNow['name1'];
                    $id1[] = $getNow['id1'];
            }
            

            $match_info = $number + 1;

            $update = "UPDATE game_matches SET status = 'game', round = '$number', team1 = '$id[0]', team1_name = '$name[0]',team1_1 = '$id1[0]',team1_name1 = '$name1[0]', team2 = '$id[1]', team2_name = '$name[1]', team2_2 = '$id1[1]', team2_name2 = '$name1[1]' WHERE match_info = '$match_info' AND game_id = '$gameId' AND event_id = '$eventId' AND type = 'double'";
            mysqli_query($conn,$update);

            // clear array
            $name = [];
            $id = [];

            $name1 = [];
            $id1 = [];

       }else{
        backToScore($eventId,$gameId,$gameType,'double');
       }

       backToScore($eventId,$gameId,$gameType,'double');
    }

    function generateSingleSEG($conn,$gameId,$eventId,$gameType,$id){

        // call the function para ma kuha ang value sa current na round
        $currentRound = getCurrentRoundSingle($conn,$gameId,$eventId);

      
        // call the function para ma check if naa pay wala na score sa round 
        $checkRound = checkIfThereStillMatchesNotScoredInThisRoundSingle($conn,$gameId,$eventId,$currentRound);

        $number = $currentRound + 1;

        if($number == 3){
            backToScore($eventId,$gameId,$gameType,'single');
        }else{
                if($checkRound == false){
                                // call the function para ma balik sa game list na page!
                                    
                                backToScore($eventId,$gameId,$gameType,'single');
                                    
                        }else{
                            $nextRound = $currentRound + 1;
                        
                        
                                singleSEG($conn,$gameId,$eventId,$id);
                            
                        
                            backToScore($eventId,$gameId,$gameType,'single');

                        }
        }
        
        


    }

    function generateDoubleSEG($conn,$gameId,$eventId,$gameType,$id){

        // call the function para ma kuha ang value sa current na round
        $currentRound = getCurrentRoundDouble($conn,$gameId,$eventId);

      
        // call the function para ma check if naa pay wala na score sa round 
        $checkRound = checkIfThereStillMatchesNotScoredInThisRoundDouble($conn,$gameId,$eventId,$currentRound);

        $number = $currentRound + 1;

        if($number == 3){
            backToScore($eventId,$gameId,$gameType,'double');
        }else{
                if($checkRound == false){
                                // call the function para ma balik sa game list na page!
                                    
                                backToScore($eventId,$gameId,$gameType,'double');
                                    
                        }else{
                            $nextRound = $currentRound + 1;
                        
                        
                            DoubleSEG($conn,$gameId,$eventId,$id);
                            
                        
                            backToScore($eventId,$gameId,$gameType,'double');

                        }
        }
        
        


    }

    function singleSEG($conn,$gameId,$eventId,$id){

        $getMatchesFor2ndRound = "SELECT * FROM players WHERE game_id = '$gameId' AND event_id = '$eventId' AND bracket = 'W' AND player_number = 'player1'";
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

        $update2ndRound = "UPDATE game_matches SET status = 'game', round = '2', team1 = '$Name1Id', team1_name = '$Name1', team2 = '$Name2Id', team2_name = '$Name2' WHERE game_id = '$gameId' AND event_id = '$eventId' AND match_info = '$match_info' AND type = 'single'";
        mysqli_query($conn,$update2ndRound);

    }

    function DoubleSEG($conn,$gameId,$eventId,$id){

        $getMatchesFor2ndRound = "SELECT * FROM players WHERE game_id = '$gameId' AND event_id = '$eventId' AND bracket = 'W' AND player_number = 'player2'";
        $query = mysqli_query($conn,$getMatchesFor2ndRound);

        $loserName = [];
        $loserId = [];
        $loserName1 = [];
        $loserId1 = [];
        while($getData = mysqli_fetch_assoc($query)){
            $loserName[] = $getData['name'];
            $loserId[] = $getData['id'];
            $loserName1[] = $getData['name1'];
            $loserId1[] = $getData['id'];
        }

        $Name1 = $loserName[0];
        $Name2 = $loserName[1];
        $Name1Id = $loserId[0];
        $Name2Id = $loserId[1];

        $Name1_1 = $loserName1[0];
        $Name2_1 = $loserName1[1];
        $Name1Id_1 = $loserId1[0];
        $Name2Id_1 = $loserId1[1];
        $match_info = 3;

        $update2ndRound = "UPDATE game_matches SET status = 'game', round = '2', team1 = '$Name1Id', team1_name = '$Name1', team1_1 = '$Name1Id_1',team1_name1 = '$Name1_1', team2 = '$Name2Id', team2_name = '$Name2', team2_2 = '$Name2Id_1', team2_name2 = '$Name2_1' WHERE game_id = '$gameId' AND event_id = '$eventId' AND match_info = '$match_info' AND type = 'double'";
        mysqli_query($conn,$update2ndRound);

    }





      // function para ma know and current round
      function getCurrentRoundDouble($conn,$gameId,$eventId){
        $sql = "SELECT MAX(round) AS max_value FROM game_matches WHERE game_id = $gameId AND event_id = $eventId AND type = 'double'";
            $query = mysqli_query($conn,$sql);

            $result = mysqli_fetch_assoc($query);

            return $result['max_value'];
    }

     // function para ma know and current round
     function getCurrentRoundSingle($conn,$gameId,$eventId){
        $sql = "SELECT MAX(round) AS max_value FROM game_matches WHERE game_id = $gameId AND event_id = $eventId AND type = 'single'";
            $query = mysqli_query($conn,$sql);

            $result = mysqli_fetch_assoc($query);

            return $result['max_value'];
    }


    function specialMatchPending($conn,$eventId,$gameId,$id,$winnerId,$name,$name1,$gameType,$type){
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
    

    // function para ma detect if na scoran naba ang tanan na matches na ani na round
    function checkIfThereStillMatchesNotScoredInThisRoundSingle($conn,$gameId,$eventId,$currentRound){

            $sql = "SELECT * FROM game_matches WHERE game_id = $gameId AND event_id = $eventId AND round = $currentRound AND status = 'game' AND type = 'single'";
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

     // function para ma detect if na scoran naba ang tanan na matches na ani na round
     function checkIfThereStillMatchesNotScoredInThisRoundDouble($conn,$gameId,$eventId,$currentRound){

        $sql = "SELECT * FROM game_matches WHERE game_id = $gameId AND event_id = $eventId AND round = $currentRound AND status = 'game' AND type = 'double'";
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
    

        function DetermineBracketWinner($conn,$eventId,$gameId,$id,$condition,$gameType){
            $sqlCheck = "SELECT * FROM players WHERE event_id = $eventId AND game_id = $gameId and id = $id";
            $query = mysqli_query($conn,$sqlCheck);
            $result = mysqli_fetch_assoc($query);

            if($result['bracket_status'] == 1){
                return null;
            }else{
                    
                        $sqlUpdate = "UPDATE players SET bracket = 'W', bracket_status = 1 WHERE id = $id";
                        mysqli_query($conn,$sqlUpdate);
                    
            }
        }

        function DetermineBracketLoser($conn,$eventId,$gameId,$id,$condition,$gameType){
            $sqlCheck = "SELECT * FROM players WHERE event_id = $eventId AND game_id = $gameId and id = $id";
            $query = mysqli_query($conn,$sqlCheck);
            $result = mysqli_fetch_assoc($query);

            if($result['bracket_status'] == 1){
                return null;
            }else{
                    
                        $sqlUpdate = "UPDATE players SET bracket = 'L', bracket_status = 1 WHERE id = $id";
                        mysqli_query($conn,$sqlUpdate);
                    
            }
        }
     // function To Proceed Back To Game List
     function backToScore($eventId,$gameId,$gameType,$type) {
        // Redirect to the score page with parameters

        
        header('Location: score.php?event_id=' . urlencode($eventId) . 
               '&game_id=' . urlencode($gameId) . 
               '&game_type=' . urlencode($gameType) . 
               '&type=' . urlencode($type));  
        exit();  // Always add exit after header redirection to prevent further script execution
    }
?>