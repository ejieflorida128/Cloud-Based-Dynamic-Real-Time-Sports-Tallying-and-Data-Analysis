<?php
    session_start();
    include('../connection/conn.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $game_type = $_POST['gameType'];
            $team_id = $_POST['team_id'];
            $event_id = $_POST['event_id'];
            $game_id = $_POST['game_id'];
            $id = $_POST['id'];
            $category = $_POST['category'];
            

         

            if($game_type == 'Mr_and_Mrs_Panagtigi'){

                    if($category == 'Men'){
                        $A = isset($_POST['A']) && $_POST['A'] !== '' ? $_POST['A'] : null;
                        $B = isset($_POST['B']) && $_POST['B'] !== '' ? $_POST['B'] : null;
                        $C = isset($_POST['C']) && $_POST['C'] !== '' ? $_POST['C'] : null;
                        $D = isset($_POST['D']) && $_POST['D'] !== '' ? $_POST['D'] : null;
                        
        
                            $sqlUpdate = "UPDATE teams SET A = $A, B = $B, C = $C, D = $D WHERE id = $team_id";
                            mysqli_query($conn,$sqlUpdate);
                    }else{
                        $A = isset($_POST['E']) && $_POST['E'] !== '' ? $_POST['E'] : null;
                        $B = isset($_POST['F']) && $_POST['F'] !== '' ? $_POST['F'] : null;
                        $C = isset($_POST['G']) && $_POST['G'] !== '' ? $_POST['G'] : null;
                        $D = isset($_POST['H']) && $_POST['H'] !== '' ? $_POST['H'] : null;
                        
        
                            $sqlUpdate = "UPDATE teams SET E = $A, F = $B, G = $C, H = $D WHERE id = $team_id";
                            mysqli_query($conn,$sqlUpdate);
                    }

               
                    header('Location: criteriaForMrAndMrsPanagtigi.php?team_id=' . urlencode($team_id). '&&category=' . urlencode($category)); 
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
                

                    $sqlUpdate = "UPDATE players SET A = $A, B = $B, C = $C, D = $D, E = $E, F = $F WHERE event_id = '$event_id' AND game_id = '$game_id' AND team_id = '$team_id' AND id = '$id'";
                    mysqli_query($conn,$sqlUpdate);
                    header('Location: criteriaForDanceSports.php?event_id=' . urlencode($event_id) . '&&game_id=' . urlencode($game_id) . '&&team_id=' . urlencode($team_id) . '&&game_type=' . urlencode($game_type) . '&&id=' . urlencode($id)); 
            }



            
    }

?>