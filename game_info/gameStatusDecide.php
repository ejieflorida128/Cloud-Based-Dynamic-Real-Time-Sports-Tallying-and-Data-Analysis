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
                for($x = 0; $x < $teamCount; $x++){
                                $sql = "INSERT INTO teams (game_id,event_id,team_name,logo) VALUES ('$gameId','$event_id','Team Name','../logo/default.png')";
                                mysqli_query($conn,$sql);
                }

                $update = 1;

                $sqlForUpdate = "UPDATE registered_game SET CreatedTeam = $update WHERE id = $gameId";
                mysqli_query($conn,$sqlForUpdate);

                header('Location: needInformation.php');
        
        }else if($gameStatus == 1){
                    
                    header('Location: needInformation.php');

            }else if($gameStatus == 2){

                
                    header('Location: showEventInformation.php');
                        

            }
            

?>