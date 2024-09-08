<?php
session_start();
include('../connection/conn.php');

$gameStatus = $_GET['status'];
$gameId = $_GET['registerGameId'];
$event_id = $_GET['eventId'];
$gameType = $_GET['gameType'];
$teamCount = $_SESSION['teamCount'];

$sqlGetEliType = "SELECT EliminationType, meters FROM registered_game WHERE id = $gameId";
$query = mysqli_query($conn,$sqlGetEliType);
$result = mysqli_fetch_assoc($query);

$_SESSION['EliminationType'] = $result['EliminationType'];
$_SESSION['meter'] = $result['meters'];

$_SESSION['GameId'] = $gameId;
$_SESSION['EventId'] = $event_id;
$_SESSION['GameType'] = $gameType;


if($gameStatus == 0){
    // Insert teams into the database
        $team = ['Cyber Falcon','Blazing Biz','Azure Dragons','Valient Sabertooth'];
        $logo = ['../logo/bsit.jpg','../logo/bsba.jpg','../logo/labhigh.jpg','../logo/educ.jpg'];

    for($x = 0; $x < $teamCount; $x++){
        $sql = "INSERT INTO teams (game_id, event_id, team_name, team_number, logo) VALUES ('$gameId', '$event_id', '$team[$x]', '$x', '$logo[$x]')";
        mysqli_query($conn, $sql);
    }

               
                $sqlCheckIfExisted = "SELECT * FROM tally WHERE event_id = '$event_id'";
                $query = mysqli_query($conn, $sqlCheckIfExisted);

          
                if ($query) {
                   
                    $number = mysqli_num_rows($query);

                    if ($number == 0) {
                        for($x = 0; $x < $teamCount; $x++){
                            $sql = "INSERT INTO tally (event_id, team_name) VALUES ('$event_id', '$team[$x]')";
                            mysqli_query($conn, $sql);
                        }
                    }
                } else {
                    
                    echo "Error: " . mysqli_error($conn);
                }


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
