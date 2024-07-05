<?php
          session_start();
          include('../connection/conn.php');   

            $numberOfPlayer = $_SESSION['number_of_player'];
            $game_id = $_SESSION['GameId'];
            $event_id = $_SESSION['EventId'];
            $gameType = $_SESSION['GameType'];
            $team_id = $_SESSION['idOfTeam'];


          if($_SERVER['REQUEST_METHOD'] == "POST"){

                    if($gameType == 'Basketball_Men' || $gameType == 'Basketball_Women'){
                                // start sa if statement of basketball

                                        

                                        for($x = 1; $x <= $numberOfPlayer; $x++){

                                            $name = $_POST['name'.$x];
                                            $age = $_POST['age'.$x];

                                            $player = 'player'.$x;

                                            $update = "UPDATE players SET name = '$name', age = '$age' WHERE game_id = $game_id AND event_id = $event_id AND team_id = $team_id AND player_number = '$player'";
                                            mysqli_query($conn,$update);

                                        }

                                        header('Location: addTeamMember.php?id='.urldecode($team_id));


                                // end sa if statement for basketball
                    }else if($gameType == 'Vollayball_Men' || $gameType == 'Vollayball_Women'){
                          // start sa statement sa vollayball

                          for($x = 1; $x <= $numberOfPlayer; $x++){

                            $name = $_POST['name'.$x];
                            $age = $_POST['age'.$x];

                            $player = 'player'.$x;

                            $update = "UPDATE players SET name = '$name', age = '$age' WHERE game_id = $game_id AND event_id = $event_id AND team_id = $team_id AND player_number = '$player'";
                            mysqli_query($conn,$update);

                        }

                        header('Location: addTeamMember.php?id='.urldecode($team_id));
                             

                          // end sa statement sa vollayball
                    }else if($gameType == 'Softball_Men' || $gameType == 'Softball_Women'){
                          // start sa statement sa softball 

                          for($x = 1; $x <= $numberOfPlayer; $x++){

                            $name = $_POST['name'.$x];
                            $age = $_POST['age'.$x];

                            $player = 'player'.$x;

                            $update = "UPDATE players SET name = '$name', age = '$age' WHERE game_id = $game_id AND event_id = $event_id AND team_id = $team_id AND player_number = '$player'";
                            mysqli_query($conn,$update);

                        }

                        header('Location: addTeamMember.php?id='.urldecode($team_id));

                          // end sa statement sa softball
                    }else if($gameType == 'Runs_Men' || $gameType == 'Runs_Women'){
                      // start sa statement sa runs

                      for($x = 1; $x <= $numberOfPlayer; $x++){

                        $name = $_POST['name'.$x];
                        $age = $_POST['age'.$x];

                        $player = 'player'.$x;

                        $update = "UPDATE players SET name = '$name', age = '$age' WHERE game_id = $game_id AND event_id = $event_id AND team_id = $team_id AND player_number = '$player'";
                        mysqli_query($conn,$update);

                    }

                    header('Location: addTeamMember.php?id='.urldecode($team_id));


                      // end sa statement sa runs

                    }else if($gameType == 'Throws_Men' || $gameType == 'Throws_Women'){
                        // start sa statement sa throws 

                        for($x = 1; $x <= $numberOfPlayer; $x++){

                          $name = $_POST['name'.$x];
                          $age = $_POST['age'.$x];
  
                          $player = 'player'.$x;
  
                          $update = "UPDATE players SET name = '$name', age = '$age' WHERE game_id = $game_id AND event_id = $event_id AND team_id = $team_id AND player_number = '$player'";
                          mysqli_query($conn,$update);
  
                      }
  
                      header('Location: addTeamMember.php?id='.urldecode($team_id));

                        // end sa statement sa throws
                    }else if($gameType == 'Jumps_Men' || $gameType == 'Jumps_Women'){
                      // start sa statement sa jumps 

                      for($x = 1; $x <= $numberOfPlayer; $x++){

                        $name = $_POST['name'.$x];
                        $age = $_POST['age'.$x];

                        $player = 'player'.$x;

                        $update = "UPDATE players SET name = '$name', age = '$age' WHERE game_id = $game_id AND event_id = $event_id AND team_id = $team_id AND player_number = '$player'";
                        mysqli_query($conn,$update);

                    }

                    header('Location: addTeamMember.php?id='.urldecode($team_id));

                      // end sa statement sa jumps
                  }else if($gameType == 'MLBB'){
                        // start sa MLBB

                        for($x = 1; $x <= $numberOfPlayer; $x++){

                          $name = $_POST['name'.$x];
                          $age = $_POST['age'.$x];
  
                          $player = 'player'.$x;
  
                          $update = "UPDATE players SET name = '$name', age = '$age' WHERE game_id = $game_id AND event_id = $event_id AND team_id = $team_id AND player_number = '$player'";
                          mysqli_query($conn,$update);
  
                      }
  
                      header('Location: addTeamMember.php?id='.urldecode($team_id));

                        // end sa MLBB
                  }else if($gameType == 'Badminton_Single_Men' || $gameType == 'Badminton_Single_Women'){
                        // start sa single badminton

                        for($x = 1; $x <= $numberOfPlayer; $x++){

                          $name = $_POST['name'.$x];
                          $age = $_POST['age'.$x];
  
                          $player = 'player'.$x;
  
                          $update = "UPDATE players SET name = '$name', age = '$age' WHERE game_id = $game_id AND event_id = $event_id AND team_id = $team_id AND player_number = '$player'";
                          mysqli_query($conn,$update);
  
                      }
  
                      header('Location: addTeamMember.php?id='.urldecode($team_id));

                        // end sa single badminton
                  }else if($gameType == 'Badminton_Double_Men' || $gameType == 'Badminton_Double_Women'){
                    // start sa double badminton

                    for($x = 1; $x <= $numberOfPlayer; $x++){

                      $name = $_POST['name1'.$x];
                      $age = $_POST['age1'.$x];

                      $name1 = $_POST['name2'.$x];
                      $age1 = $_POST['age2'.$x];

                      

                      $player = 'player'.$x;

                      $update = "UPDATE players SET name = '$name', age = '$age', name1 = '$name1', age1 = '$age1' WHERE game_id = $game_id AND event_id = $event_id AND team_id = $team_id AND player_number = '$player'";
                      mysqli_query($conn,$update);

                  }

                  header('Location: addTeamMember.php?id='.urldecode($team_id));

                    // end sa double badminton
              }else if($gameType == 'Table_tennis_Single_Men' || $gameType == 'Table_tennis_Single_Women'){
                // start sa single table tennis

                for($x = 1; $x <= $numberOfPlayer; $x++){

                  $name = $_POST['name'.$x];
                  $age = $_POST['age'.$x];

                  $player = 'player'.$x;

                  $update = "UPDATE players SET name = '$name', age = '$age' WHERE game_id = $game_id AND event_id = $event_id AND team_id = $team_id AND player_number = '$player'";
                  mysqli_query($conn,$update);

              }

              header('Location: addTeamMember.php?id='.urldecode($team_id));

                // end sa single table tennis
          }else if($gameType == 'Table_tennis_Double_Men' || $gameType == 'Table_tennis_Double_Women'){
            // start sa double badminton

            for($x = 1; $x <= $numberOfPlayer; $x++){

              $name = $_POST['name1'.$x];
              $age = $_POST['age1'.$x];

              $name1 = $_POST['name2'.$x];
              $age1 = $_POST['age2'.$x];

              

              $player = 'player'.$x;

              $update = "UPDATE players SET name = '$name', age = '$age', name1 = '$name1', age1 = '$age1' WHERE game_id = $game_id AND event_id = $event_id AND team_id = $team_id AND player_number = '$player'";
              mysqli_query($conn,$update);

          }

          header('Location: addTeamMember.php?id='.urldecode($team_id));

            // end sa double badminton
      }else if($gameType == 'Futsal_Men' || $gameType == 'Futsal_Women'){
        // start sa futsal

        for($x = 1; $x <= $numberOfPlayer; $x++){

          $name = $_POST['name'.$x];
          $age = $_POST['age'.$x];

          $player = 'player'.$x;

          $update = "UPDATE players SET name = '$name', age = '$age' WHERE game_id = $game_id AND event_id = $event_id AND team_id = $team_id AND player_number = '$player'";
          mysqli_query($conn,$update);

      }

      header('Location: addTeamMember.php?id='.urldecode($team_id));

        // end sa futsal
  }else if($gameType == 'Dance_Sports'){
    // start sa dancce sports

    for($x = 1; $x <= $numberOfPlayer; $x++){

      $name = $_POST['name1'.$x];
      $age = $_POST['age1'.$x];

      $name1 = $_POST['name2'.$x];
      $age1 = $_POST['age2'.$x];

      

      $player = 'player'.$x;

      $update = "UPDATE players SET name = '$name', age = '$age', name1 = '$name1', age1 = '$age1' WHERE game_id = $game_id AND event_id = $event_id AND team_id = $team_id AND player_number = '$player'";
      mysqli_query($conn,$update);

  }

  header('Location: addTeamMember.php?id='.urldecode($team_id));

    // end sa dance sports
}else if($gameType == 'Chess'){
  // start sa chess

  for($x = 1; $x <= $numberOfPlayer; $x++){

    $name = $_POST['name'.$x];
    $age = $_POST['age'.$x];

    $player = 'player'.$x;

    $update = "UPDATE players SET name = '$name', age = '$age' WHERE game_id = $game_id AND event_id = $event_id AND team_id = $team_id AND player_number = '$player'";
    mysqli_query($conn,$update);

}

header('Location: addTeamMember.php?id='.urldecode($team_id));

  // end sa chess
}else if($gameType == 'Archery'){
  // start sa Archery

  for($x = 1; $x <= $numberOfPlayer; $x++){

    $name = $_POST['name'.$x];
    $age = $_POST['age'.$x];

    $player = 'player'.$x;

    $update = "UPDATE players SET name = '$name', age = '$age' WHERE game_id = $game_id AND event_id = $event_id AND team_id = $team_id AND player_number = '$player'";
    mysqli_query($conn,$update);

}

header('Location: addTeamMember.php?id='.urldecode($team_id));

  // end sa Archery
}else if($gameType == 'Creative_Folk_Dance'){
  // start sa Creative_Folk_Dance

  for($x = 1; $x <= $numberOfPlayer; $x++){

    $name = $_POST['name'.$x];
    $age = $_POST['age'.$x];

    $player = 'player'.$x;

    $update = "UPDATE players SET name = '$name', age = '$age' WHERE game_id = $game_id AND event_id = $event_id AND team_id = $team_id AND player_number = '$player'";
    mysqli_query($conn,$update);

}

header('Location: addTeamMember.php?id='.urldecode($team_id));

  // end sa Creative_Folk_Dance
}else if($gameType == 'Pop_Dance'){
  // start sa Pop_Dance

  for($x = 1; $x <= $numberOfPlayer; $x++){

    $name = $_POST['name'.$x];
    $age = $_POST['age'.$x];

    $player = 'player'.$x;

    $update = "UPDATE players SET name = '$name', age = '$age' WHERE game_id = $game_id AND event_id = $event_id AND team_id = $team_id AND player_number = '$player'";
    mysqli_query($conn,$update);

}

header('Location: addTeamMember.php?id='.urldecode($team_id));

  // end sa Pop_Dance
}else if($gameType == 'Vocal_Duet'){
  // start sa Vocal_Duet

  for($x = 1; $x <= $numberOfPlayer; $x++){

    $name = $_POST['name1'.$x];
    $age = $_POST['age1'.$x];

    $name1 = $_POST['name2'.$x];
    $age1 = $_POST['age2'.$x];

    

    $player = 'player'.$x;

    $update = "UPDATE players SET name = '$name', age = '$age', name1 = '$name1', age1 = '$age1' WHERE game_id = $game_id AND event_id = $event_id AND team_id = $team_id AND player_number = '$player'";
    mysqli_query($conn,$update);

}

header('Location: addTeamMember.php?id='.urldecode($team_id));

  // end sa Vocal_Duet
}else if($gameType == 'Pop_Solo'){
  // start sa Pop_Solo

  for($x = 1; $x <= $numberOfPlayer; $x++){

    $name = $_POST['name'.$x];
    $age = $_POST['age'.$x];

    $player = 'player'.$x;

    $update = "UPDATE players SET name = '$name', age = '$age' WHERE game_id = $game_id AND event_id = $event_id AND team_id = $team_id AND player_number = '$player'";
    mysqli_query($conn,$update);

}

header('Location: addTeamMember.php?id='.urldecode($team_id));

  // end sa Pop_Solo
}else if($gameType == 'Charcoal_Rendering'){
  // start sa Charcoal_Rendering

  for($x = 1; $x <= $numberOfPlayer; $x++){

    $name = $_POST['name'.$x];
    $age = $_POST['age'.$x];

    $player = 'player'.$x;

    $update = "UPDATE players SET name = '$name', age = '$age' WHERE game_id = $game_id AND event_id = $event_id AND team_id = $team_id AND player_number = '$player'";
    mysqli_query($conn,$update);

}

header('Location: addTeamMember.php?id='.urldecode($team_id));

  // end sa Charcoal_Rendering
}else if($gameType == 'Pencil_Drawing'){
  // start sa Pencil_Drawing

  for($x = 1; $x <= $numberOfPlayer; $x++){

    $name = $_POST['name'.$x];
    $age = $_POST['age'.$x];

    $player = 'player'.$x;

    $update = "UPDATE players SET name = '$name', age = '$age' WHERE game_id = $game_id AND event_id = $event_id AND team_id = $team_id AND player_number = '$player'";
    mysqli_query($conn,$update);

}

header('Location: addTeamMember.php?id='.urldecode($team_id));

  // end sa Pencil_Drawing
}else if($gameType == 'Painting'){
  // start sa Painting

  for($x = 1; $x <= $numberOfPlayer; $x++){

    $name = $_POST['name'.$x];
    $age = $_POST['age'.$x];

    $player = 'player'.$x;

    $update = "UPDATE players SET name = '$name', age = '$age' WHERE game_id = $game_id AND event_id = $event_id AND team_id = $team_id AND player_number = '$player'";
    mysqli_query($conn,$update);

}

header('Location: addTeamMember.php?id='.urldecode($team_id));

  // end sa Painting
}else if($gameType == 'Poster_Making'){
  // start sa Poster_Making

  for($x = 1; $x <= $numberOfPlayer; $x++){

    $name = $_POST['name'.$x];
    $age = $_POST['age'.$x];

    $player = 'player'.$x;

    $update = "UPDATE players SET name = '$name', age = '$age' WHERE game_id = $game_id AND event_id = $event_id AND team_id = $team_id AND player_number = '$player'";
    mysqli_query($conn,$update);

}

header('Location: addTeamMember.php?id='.urldecode($team_id));

  // end sa Poster_Making
}else if($gameType == 'Phone_Photography'){
  // start sa Phone_Photography

  for($x = 1; $x <= $numberOfPlayer; $x++){

    $name = $_POST['name'.$x];
    $age = $_POST['age'.$x];

    $player = 'player'.$x;

    $update = "UPDATE players SET name = '$name', age = '$age' WHERE game_id = $game_id AND event_id = $event_id AND team_id = $team_id AND player_number = '$player'";
    mysqli_query($conn,$update);

}

header('Location: addTeamMember.php?id='.urldecode($team_id));

  // end sa Phone_Photography
}else if($gameType == 'Mr_and_Mrs_Panagtigi'){
  // start sa Mr_and_Mrs_Panagtigi

  for($x = 1; $x <= $numberOfPlayer; $x++){

    $name = $_POST['name1'.$x];
    $age = $_POST['age1'.$x];

    $name1 = $_POST['name2'.$x];
    $age1 = $_POST['age2'.$x];

    

    $player = 'player'.$x;

    $update = "UPDATE players SET name = '$name', age = '$age', name1 = '$name1', age1 = '$age1' WHERE game_id = $game_id AND event_id = $event_id AND team_id = $team_id AND player_number = '$player'";
    mysqli_query($conn,$update);

}

header('Location: addTeamMember.php?id='.urldecode($team_id));

              // end sa Mr_and_Mrs_Panagtigi
            }else if($gameType == 'Mass_Dance'){
              // start sa Mass_Dance
            
              for($x = 1; $x <= $numberOfPlayer; $x++){
            
                $name = $_POST['name'.$x];
                $age = $_POST['age'.$x];
            
                $player = 'player'.$x;
            
                $update = "UPDATE players SET name = '$name', age = '$age' WHERE game_id = $game_id AND event_id = $event_id AND team_id = $team_id AND player_number = '$player'";
                mysqli_query($conn,$update);
            
            }
            
            header('Location: addTeamMember.php?id='.urldecode($team_id));
            
              // end sa Mass_Dance
            }


                    
            
          }


?>