<?php

session_start();
include('../connection/conn.php');

$game_id = $_SESSION['GameId'];
$event_id = $_SESSION['EventId'];
$gameType = $_SESSION['GameType'];
$team_count = $_SESSION['teamCount'];

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
    getDoubleEliminationMatches($team_count, $game_id, $event_id, $gameType, $conn);
} else if($gameType == 'Badminton_Single_Men' || $gameType == 'Badminton_Double_Men' || $gameType == 'Badminton_Single_Women' || $gameType == 'Badminton_Double_Women' || $gameType == 'Table_tennis_Single_Men' || $gameType == 'Table_tennis_Double_Men' || $gameType == 'Table_tennis_Single_Women' || $gameType == 'Table_tennis_Double_Women' || $gameType == 'Chess' || $gameType == 'Archery'){
    // handle games like sa mga teams with player ang style like table tennis and badmnton 
    getDoubleEliminationMatchesWithSingleAndDoubleCategory($team_count, $game_id, $event_id, $gameType, $conn);
}

header('Location: ../addGames.php?id=' . urlencode($event_id) . '&teamCount=' . urlencode($team_count));  // Redirect sa addGames page with event_id ug team_count parameters
exit();  // Exit the script

// function to calculate total matches sa game nga naay single or double category
function getDoubleEliminationMatchesWithSingleAndDoubleCategory($number, $game_id, $event_id, $gameType, $conn){

    if($gameType == 'Badminton_Single_Men' || $gameType == 'Badminton_Double_Men' || $gameType == 'Table_tennis_Single_Men' || $gameType == 'Table_tennis_Double_Men' || $gameType == 'Chess' || $gameType == 'Archery'){
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


// function calculate first round sa game with single and double category
function calculateGameStatusAndRoundWithSingleAndDoubleCategory($numPlayers, $game_id, $event_id, $gameType, $conn) {
    // Find ang sunod nga power of 2 nga daku o equal sa number sa mga teams
    $nextPowerOfTwo = pow(2, ceil(log($numPlayers) / log(2)));

    // Calculate ang number sa byes
    $numByes = $nextPowerOfTwo - $numPlayers;

    // Generate ang first round sa matches
    generateFirstRoundMatchesWithSingleAndDoubleCategory($numPlayers, $numByes, $game_id, $event_id, $gameType, $conn);
}


// Function to generate the first round of matches with single and double category
function generateFirstRoundMatchesWithSingleAndDoubleCategory($numPlayers, $numByes, $game_id, $event_id, $gameType, $conn) {
    // Retrieve the players from the database
    $players = [];
    if($gameType == 'Badminton_Single_Men' || $gameType == 'Table_tennis_Single_Men' || $gameType == 'Badminton_Single_Women' || $gameType == 'Table_tennis_Single_Women' || $gameType == 'Chess' || $gameType == 'Archery'){
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


// Function to update ang first round sa matches with ang actual nga IDs ug mga pangalan sa teams game with single and double category
function updateFirstRoundMatchesWithSingleAndDoubleCategory($playingPlayers, $game_id, $event_id, $gameType, $conn) {

    if($gameType == 'Badminton_Single_Men' || $gameType == 'Table_tennis_Single_Men' || $gameType == 'Badminton_Single_Women' || $gameType == 'Table_tennis_Single_Women' || $gameType == 'Chess' || $gameType == 'Archery'){
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

// Function to calculate total matches for double elimination
function getDoubleEliminationMatches($number, $game_id, $event_id, $gameType, $conn) {
    $winner_number = $number - 1;  // Number sa matches sa winner's bracket
    $loser_number = $number - 1;   // Number sa matches sa loser's bracket
    $totalmatches = $winner_number + $loser_number + 1;  // Total number sa matches

    insertIntoDatabaseWithTheTotalMatchesValue($totalmatches, $number, $game_id, $event_id, $gameType, $conn);  // Insert ang mga matches sa database
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
