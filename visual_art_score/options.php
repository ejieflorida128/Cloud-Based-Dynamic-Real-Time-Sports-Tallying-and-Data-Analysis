<?php
    session_start();
    include('../connection/conn.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $game_type = $_POST['gameType'];
            $team_id = $_POST['team_id'];
            

         

            if($game_type == 'Charcoal_Rendering'){

                $A = isset($_POST['A']) && $_POST['A'] !== '' ? $_POST['A'] : null;
                $B = isset($_POST['B']) && $_POST['B'] !== '' ? $_POST['B'] : null;
                $C = isset($_POST['C']) && $_POST['C'] !== '' ? $_POST['C'] : null;
              

                    $sqlUpdate = "UPDATE teams SET A = $A, B = $B, C = $C WHERE id = $team_id";
                    mysqli_query($conn,$sqlUpdate);
                    header('Location: criteriaForCharcoalRendering.php?team_id=' . urlencode($team_id)); 
            }else if($game_type == 'Pencil_Drawing'){
                $A = isset($_POST['A']) && $_POST['A'] !== '' ? $_POST['A'] : null;
                $B = isset($_POST['B']) && $_POST['B'] !== '' ? $_POST['B'] : null;
                $C = isset($_POST['C']) && $_POST['C'] !== '' ? $_POST['C'] : null;
            

                $sqlUpdate = "UPDATE teams SET A = $A, B = $B, C = $C WHERE id = $team_id";
                mysqli_query($conn,$sqlUpdate);
                header('Location: criteriaForPencilDrawing.php?team_id=' . urlencode($team_id)); 
            }else if($game_type == 'Painting'){

                $A = isset($_POST['A']) && $_POST['A'] !== '' ? $_POST['A'] : null;
                $B = isset($_POST['B']) && $_POST['B'] !== '' ? $_POST['B'] : null;
                $C = isset($_POST['C']) && $_POST['C'] !== '' ? $_POST['C'] : null;
              

                    $sqlUpdate = "UPDATE teams SET A = $A, B = $B, C = $C WHERE id = $team_id";
                    mysqli_query($conn,$sqlUpdate);
                    header('Location: criteriaForPainting.php?team_id=' . urlencode($team_id)); 
            }else if($game_type == 'Poster_Making'){
                $A = isset($_POST['A']) && $_POST['A'] !== '' ? $_POST['A'] : null;
                $B = isset($_POST['B']) && $_POST['B'] !== '' ? $_POST['B'] : null;
                $C = isset($_POST['C']) && $_POST['C'] !== '' ? $_POST['C'] : null;
            

                $sqlUpdate = "UPDATE teams SET A = $A, B = $B, C = $C WHERE id = $team_id";
                mysqli_query($conn,$sqlUpdate);
                header('Location: criteriaForPosterMaking.php?team_id=' . urlencode($team_id)); 
            }else if($game_type == 'Phone_Photography'){

                $A = isset($_POST['A']) && $_POST['A'] !== '' ? $_POST['A'] : null;
                $B = isset($_POST['B']) && $_POST['B'] !== '' ? $_POST['B'] : null;
                $C = isset($_POST['C']) && $_POST['C'] !== '' ? $_POST['C'] : null;
              

                    $sqlUpdate = "UPDATE teams SET A = $A, B = $B, C = $C WHERE id = $team_id";
                    mysqli_query($conn,$sqlUpdate);
                    header('Location: criteriaForPhonePhotography.php?team_id=' . urlencode($team_id)); 
            }



            
    }

?>