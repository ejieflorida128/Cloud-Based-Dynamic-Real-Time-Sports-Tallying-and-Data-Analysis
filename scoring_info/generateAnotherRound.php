<?php
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
            
            if($teamOneScore > $teamTwoScore){
                    $winnerId = $team1_id;
                    $loserId = $team2_id;


                    $sqlFOrWinner = "UPDATE teams SET last_match_status = 'Winner', winner_number = winner_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND team_name = '$teamOneName'";
                    mysqli_query($conn,$sqlFOrWinner);
                    $sqlForLoser = "UPDATE teams SET last_match_status = 'Loser', lose_number = lose_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND team_name = '$teamTwoName'";
                    mysqli_query($conn,$sqlForLoser);

            }else{
                    $winnerId = $team2_id;
                    $loserId = $team1_id;

                    $sqlFOrWinner = "UPDATE teams SET last_match_status = 'Winner', winner_number = winner_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND team_name = '$teamTwoName'";
                    mysqli_query($conn,$sqlFOrWinner);
                    $sqlForLoser = "UPDATE teams SET last_match_status = 'Loser', lose_number = lose_number + 1 WHERE game_id = $gameId AND event_id = $eventId AND team_name = '$teamOneName'";
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
                //    check natu if naa bay bye!
                    $bye = checkIfByeExist($conn,$eventId,$gameId);

                    // call the genratedRound function para e execute
                    generateNewRound($conn,$eventId,$gameId,$bye,$gameType);
                    
                    
            }


        }



    // function para ma generate new round and matches
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

        echo 'no code yet!';
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
        $sql = "SELECT MAX(round) AS max_value FROM game_matches WHERE game_id = 1 AND event_id = 1";
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
