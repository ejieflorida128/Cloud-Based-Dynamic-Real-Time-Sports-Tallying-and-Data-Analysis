<?php
session_start();
include('../connection/conn.php');

$gameStatus = $_GET['status'];
$gameId = $_GET['registerGameId'];
$event_id = $_GET['eventId'];
$gameType = $_GET['gameType'];
$teamCount = $_SESSION['teamCount'];

$_SESSION['GameId'] = $gameId;
$_SESSION['EventId'] = $event_id;
$_SESSION['GameType'] = $gameType;

if($gameStatus == 0){
    // Insert teams into the database
    for($x = 1; $x <= $teamCount; $x++){
        $sql = "INSERT INTO teams (game_id, event_id, team_name, team_number, logo) VALUES ('$gameId', '$event_id', 'Team Name', '$x', '../logo/default.png')";
        mysqli_query($conn, $sql);
    }

    // // Function to calculate the number of teams without byes
    // function calculateGameStatusAndRound($numTeams){
    //     $nextPowerOfTwo = pow(2, ceil(log($numTeams) / log(2)));
    //     $numByes = $nextPowerOfTwo - $numTeams;
    //     return $numTeams - $numByes;
    // }

    // $notBye = calculateGameStatusAndRound($teamCount);

    // // Update teams with bye status
    // for($y = 1; $y <= $teamCount; $y++){
    //     if($y > $notBye){
    //         // Fixed the update query syntax to use AND
    //         $sqlForBye = "UPDATE teams SET ifBye = 'Bye' WHERE game_id = $gameId AND event_id = $event_id AND team_number = $y";
    //         mysqli_query($conn, $sqlForBye);
    //     }
    // }

    $update = 1;
    $sqlForUpdate = "UPDATE registered_game SET CreatedTeam = $update WHERE id = $gameId";
    mysqli_query($conn, $sqlForUpdate);

    header('Location: needInformation.php');
} else if ($gameStatus == 1) {
    header('Location: needInformation.php');
} else if ($gameStatus == 2) {
    header('Location: showEventInformation.php');
}
?>
