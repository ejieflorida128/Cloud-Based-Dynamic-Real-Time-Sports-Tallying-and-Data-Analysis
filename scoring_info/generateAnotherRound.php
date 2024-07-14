<?php
session_start();
include('../connection/conn.php');

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $teamOneScore = isset($_POST['teamOneScore']) ? $_POST['teamOneScore'] : null;
    $teamTwoScore = isset($_POST['teamTwoScore']) ? $_POST['teamTwoScore'] : null;
    $gameType = isset($_POST['game_type']) ? $_POST['game_type'] : null;
    $gameId = isset($_POST['game_id']) ? $_POST['game_id'] : null;
    $eventId = isset($_POST['event_id']) ? $_POST['event_id'] : null;
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $teamOneName = isset($_POST['teamOneName']) ? $_POST['teamOneName'] : null;
    $teamTwoName = isset($_POST['teamTwoName']) ? $_POST['teamTwoName'] : null;
    $match_info = isset($_POST['match_info']) ? $_POST['match_info'] : null;

    // Update game scores
    $sqlForUpdate = "UPDATE game_matches SET team_one_score = ?, team_two_score = ? WHERE id = ?";
    $stmt = $conn->prepare($sqlForUpdate);
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("iii", $teamOneScore, $teamTwoScore, $id);
    if (!$stmt->execute()) {
        die('Execute failed: ' . htmlspecialchars($stmt->error));
    }
    $stmt->close();

    // Generate and update next round matches
    updateNextRoundMatches($conn, $eventId, $gameType, $teamOneName, $teamTwoName, $match_info);

    // Redirect to the game list page
    header('Location: game_list.php?event_id=' . urlencode($eventId) . '&game_id=' . urlencode($gameId) . '&game_type=' . urlencode($gameType));
    exit;
} else {
    echo 'No form data submitted.';
}

// Function to update the next round matches
function updateNextRoundMatches($conn, $eventId, $gameType, $teamOneName, $teamTwoName, $match_info) {
    // Fetch all completed matches for the current event and game type
    $sql = "SELECT * FROM game_matches WHERE event_id = ? AND game_type = ? AND team_one_score IS NOT NULL AND team_two_score IS NOT NULL";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("ss", $eventId, $gameType);
    $stmt->execute();
    $result = $stmt->get_result();

    // Track winners and byes
    $winners = [];
    $byes = [];

    while ($row = $result->fetch_assoc()) {
        if (isset($row['team_one_score'], $row['team_two_score'], $row['team1'], $row['team2'])) {
            if ($row['team_one_score'] > $row['team_two_score']) {
                if ($row['team1'] != 0) {
                    $winners[] = $row['team1'];
                }
            } else {
                if ($row['team2'] != 0) {
                    $winners[] = $row['team2'];
                }
            }
        }
    }

    // Debug output
    echo "Winners: " . implode(', ', $winners) . "<br>";

    // Get teams with byes
    $sqlByes = "SELECT * FROM game_matches WHERE event_id = ? AND game_type = ? AND match_info = 'BYE'";
    $stmtByes = $conn->prepare($sqlByes);
    if ($stmtByes === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    $stmtByes->bind_param("ss", $eventId, $gameType);
    $stmtByes->execute();
    $resultByes = $stmtByes->get_result();

    while ($rowByes = $resultByes->fetch_assoc()) {
        if ($rowByes['team1'] != 0) {
            $byes[] = $rowByes['team1']; // Only need one team per bye row
        }
    }

    // Debug output
    echo "Byes after fetching: " . implode(', ', $byes) . "<br>";

    // Determine next round pairings
    $nextRoundMatches = getNextRoundPairings($winners, $byes);

    // Debug output
    echo "Next Round Matches: " . print_r($nextRoundMatches, true) . "<br>";

    // Update existing matches in the database
    updateMatches($conn, $eventId, $gameType, $nextRoundMatches, $teamOneName, $teamTwoName, $match_info);
}

// Function to update matches in the database
function updateMatches($conn, $eventId, $gameType, $matches, $teamOneName, $teamTwoName, $match_info) {
    $round = 'Round2'; // Set the round variable
    // $matchNumber = $match_info;
    
    // Update query with match_info included
    // $sqlUpdate = "UPDATE game_matches SET team1 = ?, team2 = ?, round = ?, match_info = ? WHERE event_id = ? AND game_type = ? AND team1 IS NULL AND team2 IS NULL AND status = ''";
    // $stmtUpdate = $conn->prepare($sqlUpdate);
    // if ($stmtUpdate === false) {
    //     die('Prepare failed: ' . htmlspecialchars($conn->error));
    // }

    $matchNumber = 1 + $match_info; // Start match numbering from 1

    foreach ($matches as $match) {
        $teamOneId = isset($match['team_one_id']) ? $match['team_one_id'] : null;
        $teamTwoId = isset($match['team_two_id']) ? $match['team_two_id'] : null;

        // Ensure we are only updating valid matches
        if ($teamOneId != null && $teamTwoId != null) {
            // Debug output with match number

            $EVENT_ID = $_SESSION['EVENT_ID'];
            $GAME_ID = $_SESSION['GAME_ID'];
            $t1 = '';
            $t2 = '';
            
            $sqlGetTeamInformation1 = "SELECT * FROM teams WHERE event_id = $EVENT_ID AND game_id = $GAME_ID AND team_number = $teamOneId";
            $query1 = mysqli_query($conn,$sqlGetTeamInformation1);

            while($getResult = mysqli_fetch_assoc($query1)){
                $t1 = $getResult['team_name'];
              

                
             }

             $sqlGetTeamInformation2 = "SELECT * FROM teams WHERE event_id = $EVENT_ID AND game_id = $GAME_ID AND team_number = $teamTwoId";
             $query2 = mysqli_query($conn,$sqlGetTeamInformation2);
 
             while($getResult = mysqli_fetch_assoc($query2)){
                 $t2 = $getResult['team_name'];
               
 
                 
              }

          

         
           echo "Updating match " . $matchNumber . " in $round: team_one_id = $teamOneId ($t1), team_two_id = $teamTwoId ($t2)<br>";

           $updateMatch = "UPDATE game_matches SET status = 'game', round = '$round', team1 = '$teamOneId', team1_name = '$t1', team2 = '$teamTwoId', team2_name = '$t2' WHERE match_info = '$matchNumber' AND game_id = '$GAME_ID' AND event_id = '$EVENT_ID'";
              mysqli_query($conn,$updateMatch);
            
            // $stmtUpdate->bind_param("ssssss", $teamOneId, $teamTwoId, $round, $match_info, $eventId, $gameType);
            // if (!$stmtUpdate->execute()) {
            //     die('Execute failed: ' . htmlspecialchars($stmtUpdate->error));
            // }

            // $updateMatchRound2 = "UPDATE game_matches"
            $matchNumber++; // Increment the match number
        }
    }

    // $stmtUpdate->close();
}

// Function to get the next round pairings
function getNextRoundPairings($winners, $byes) {
    $matches = [];

    // Pair byes with each other first
    while (count($byes) > 1) {
        $teamOne = array_shift($byes);
        $teamTwo = array_shift($byes);
        $matches[] = ['team_one_id' => $teamOne, 'team_two_id' => $teamTwo];
    }

    // If there's an odd number of byes, pair the remaining bye with a winner
    if (count($byes) === 1 && !empty($winners)) {
        $byeTeam = array_shift($byes);
        $winner = array_shift($winners);
        $matches[] = ['team_one_id' => $byeTeam, 'team_two_id' => $winner];
    }

    // Pair remaining winners
    while (count($winners) > 1) {
        $teamOne = array_shift($winners);
        $teamTwo = array_shift($winners);
        $matches[] = ['team_one_id' => $teamOne, 'team_two_id' => $teamTwo];
    }

    return $matches;
}
?>
