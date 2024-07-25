<?php
    session_start();
    include('../connection/conn.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $game_type = $_POST['gameType'];
            $team_id = $_POST['team_id'];
            

         

            if($game_type == 'Mr_and_Mrs_Panagtigi'){

                $A = isset($_POST['A']) && $_POST['A'] !== '' ? $_POST['A'] : null;
                $B = isset($_POST['B']) && $_POST['B'] !== '' ? $_POST['B'] : null;
                $C = isset($_POST['C']) && $_POST['C'] !== '' ? $_POST['C'] : null;
                $D = isset($_POST['D']) && $_POST['D'] !== '' ? $_POST['D'] : null;
                

                    $sqlUpdate = "UPDATE teams SET A = $A, B = $B, C = $C, D = $D WHERE id = $team_id";
                    mysqli_query($conn,$sqlUpdate);
                    header('Location: criteriaForMrAndMrsPanagtigi.php?team_id=' . urlencode($team_id)); 
            }else if($game_type == 'Mass_Dance'){
                $A = isset($_POST['A']) && $_POST['A'] !== '' ? $_POST['A'] : null;
                $B = isset($_POST['B']) && $_POST['B'] !== '' ? $_POST['B'] : null;
                $C = isset($_POST['C']) && $_POST['C'] !== '' ? $_POST['C'] : null;
                $D = isset($_POST['D']) && $_POST['D'] !== '' ? $_POST['D'] : null;
                

                    $sqlUpdate = "UPDATE teams SET A = $A, B = $B, C = $C, D = $D WHERE id = $team_id";
                    mysqli_query($conn,$sqlUpdate);
                    header('Location: criteriaForMassDance.php?team_id=' . urlencode($team_id)); 
            }else if($game_type == 'Dance_Sports'){
                $A = isset($_POST['A']) && $_POST['A'] !== '' ? $_POST['A'] : null;
                $B = isset($_POST['B']) && $_POST['B'] !== '' ? $_POST['B'] : null;
                $C = isset($_POST['C']) && $_POST['C'] !== '' ? $_POST['C'] : null;
                $D = isset($_POST['D']) && $_POST['D'] !== '' ? $_POST['D'] : null;
                $F = isset($_POST['F']) && $_POST['F'] !== '' ? $_POST['F'] : null;
                $E = isset($_POST['E']) && $_POST['E'] !== '' ? $_POST['E'] : null;
                

                    $sqlUpdate = "UPDATE teams SET A = $A, B = $B, C = $C, D = $D, E = $E, F = $F WHERE id = $team_id";
                    mysqli_query($conn,$sqlUpdate);
                    header('Location: criteriaForDanceSports.php?team_id=' . urlencode($team_id)); 
            }



            
    }

?>