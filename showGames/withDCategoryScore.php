<?php
// Ensure no whitespace before this line
ob_start(); 
session_start();
include('../connection/conn.php');

// Set session variables based on query parameters
$_SESSION['EVENT_ID'] = $_GET['event_id'] ?? null;
$_SESSION['GAME_ID'] = $_GET['game_id'] ?? null;
$_SESSION['GAME_TYPE'] = $_GET['game_type'] ?? null;
$_SESSION['TYPE'] = $_GET['type'] ?? null;

ob_end_flush(); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../template/AdminTemplate/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../template/AdminTemplate/assets/img/favicon.png">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


  <title>
    Scoring Page
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../template/AdminTemplate/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../template/AdminTemplate/assets/css/nucleo-svg.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Font Awesome Icons -->
  <script src="../https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../template/AdminTemplate/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../template/AdminTemplate/assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.html " target="_blank">
        <img src="../template/AdminTemplate/assets/img/favicon.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Menu</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../index.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>shop </title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(0.000000, 148.000000)">
                        <path class="color-background opacity-6" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                        <path class="color-background" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Home</span>
          </a>
        </li>

    
       
       
      
      </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
      <div class="card card-background shadow-none card-background-mask-secondary" id="sidenavCard">
        <div class="full-background" style="background-image: url('assets/img/curved-images/white-curved.jpg')"></div>
        <div class="card-body text-start p-3 w-100">
              <img src="../background_image/scuaa.jpg" style = "width: 180px; height: 180px; border-radius: 20px;">
        </div>
      </div>
     
    </div>
   
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Cloud Based Realtime Event</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Score Table</li>
          </ol>
        
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
             
            
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
         
          <li class="nav-item d-flex align-items-center">
              <a href="../index.php" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-sign-out me-sm-1"></i>
                <span class="d-sm-inline d-none">Back To Home</span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
             
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
               
              </a>
             
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
            <div class="topStorage" style = "display: flex; justify-content: space-between;">
              <div class="top1">
              <a href="../index.php" class="btn btn-danger">Back</a>
              </div>
             
            </div>
             
              
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                        <!-- start here para sa new content sa profile! -->
                         <div class="container" style = " padding: 40px;">
                               
                                <div class = "content">
                                    <div class="container-fluid">
                                            <div class="row" >
                                                  

            <div class="table-responsive p-0">


                        <!-- START SA MGA RUNS  -->

                                <?php

                                        $type = $_GET['type'];

                                        if($type == 'single'){
                                          echo '
                                          <div class="table-responsive p-0">
                                              <table class="table align-items-center mb-0">
                                                  <thead>
                                                      <tr>
                                                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Match Information</th>
                                                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Game Type</th>
                                                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Winner</th>
                                                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Loser</th>
                                                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Options</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                          ';
                                          
                                          $game_id = $_GET['game_id'];
                                          $event_id = $_GET['event_id'];
                                          $game_type = $_GET['game_type'];
                                          
                                          $getPlayersForSingle = "SELECT * FROM game_matches WHERE game_id = '$game_id' AND event_id = '$event_id' AND type = 'single' AND (status = 'game' || status = 'SCORE')";
                                          $queryForSingle = mysqli_query($conn, $getPlayersForSingle);
                                          
                                          while ($displayAllSingle = mysqli_fetch_assoc($queryForSingle)) {
                                              if ($displayAllSingle['team_one_score'] == 0 && $displayAllSingle['team_two_score'] == 0) {
                                                  $winner = 'on-going';
                                                  $loser = 'on-going';
                                              } else {
                                                  if ($displayAllSingle['team_one_score'] > $displayAllSingle['team_two_score']) {
                                                      $winner = $displayAllSingle['team1_name'];
                                                      $loser = $displayAllSingle['team2_name'];
                                                  } else {
                                                      $winner = $displayAllSingle['team2_name'];
                                                      $loser = $displayAllSingle['team1_name'];
                                                  }
                                              }
                                          
                                              $uniqueId = $displayAllSingle['id'];
                                              echo '
                                              <tr>
                                                  <td>
                                                      <div class="d-flex px-2 py-1">
                                                          ' . $displayAllSingle['team1_name'] . ' <span style="margin-left: 15px; color: orange; font-weight: bolder; margin-right: 15px;">VS</span> ' . $displayAllSingle['team2_name'] . '
                                                      </div>
                                                  </td>
                                                  <td>
                                                      <p class="text-xs font-weight-bold mb-0">' . $displayAllSingle['game_type'] . '</p>
                                                      <p class="text-xs text-secondary mb-0">single</p>
                                                  </td>
                                                  <td class="align-middle text-center text-sm">
                                                      <span class="badge badge-sm bg-gradient-success">' . $winner . '</span>
                                                  </td>
                                                  <td class="align-middle text-center text-sm">
                                                      <span class="badge badge-sm bg-gradient-danger">' . $loser . '</span>
                                                  </td>
                                                  <td class="align-middle text-center text-sm">
                                                      ';
                                          
                                                      if ($displayAllSingle['status'] == 'SCORE') {
                                                        // Button to view score
                                                        echo '<button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#view' . $uniqueId . '">View</button>';
                                                    } else {
                                                        // Disabled button with loading dots
                                                        echo '<button disabled style="border: 1px solid grey; border-radius: 10px;">
                                                                  <div class="loading-dots">
                                                                      <span></span>
                                                                      <span></span>
                                                                      <span></span>
                                                                  </div>
                                                              </button>
                                                              <style>
                                                                  .loading-dots {
                                                                      display: inline-block;
                                                                  }
                                                    
                                                                  .loading-dots span {
                                                                      display: inline-block;
                                                                      width: 10px;
                                                                      height: 10px;
                                                                      margin: 0 3px;
                                                                      background-color: #333;
                                                                      border-radius: 50%;
                                                                      animation: bounce 1.4s infinite ease-in-out both;
                                                                  }
                                                    
                                                                  .loading-dots span:nth-child(1) {
                                                                      animation-delay: -0.32s;
                                                                  }
                                                    
                                                                  .loading-dots span:nth-child(2) {
                                                                      animation-delay: -0.16s;
                                                                  }
                                                    
                                                                  @keyframes bounce {
                                                                      0%, 80%, 100% {
                                                                          transform: scale(0);
                                                                      }
                                                                      40% {
                                                                          transform: scale(1);
                                                                      }
                                                                  }
                                                              </style>';
                                                    }
                                                    
                                          
                                              echo '
                                                  </td>
                                              </tr>
                                              ';
                                          
                                              // Score modal
                                              echo '
                                              <div class="modal fade" id="score' . $uniqueId . '" tabindex="-1" role="dialog" aria-labelledby="score' . $uniqueId . 'Label" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                          <form action="generateMatches.php" method="post">  
                                                              <div class="modal-header">
                                                                  <h5 class="modal-title" id="score' . $uniqueId . 'Label">Score Board</h5>
                                                              </div>
                                                              <div class="modal-body">
                                                                  <div class="form-group">
                                                                      <label>' . $displayAllSingle['team1_name'] . ' \'s Score: </label>
                                                                      <input type="number" name="teamOneScore" value="' . $displayAllSingle['team_one_score'] . '" class="form-control">
                                                                      <label>' . $displayAllSingle['team2_name'] . ' \'s Score: </label>
                                                                      <input type="number" name="teamTwoScore" value="' . $displayAllSingle['team_two_score'] . '" class="form-control">
                                                                      <input type="text" name="teamOneName" value="' . $displayAllSingle['team1_name'] . '" hidden>
                                                                      <input type="text" name="teamTwoName" value="' . $displayAllSingle['team2_name'] . '" hidden>
                                                                      <input type="number" name="team1_id" value="' . $displayAllSingle['team1'] . '" hidden>
                                                                      <input type="number" name="team2_id" value="' . $displayAllSingle['team2'] . '" hidden>
                                                                      <input type="text" name="game_type" value="' . $displayAllSingle['game_type'] . '" hidden>
                                                                      <input type="number" name="game_id" value="' . $displayAllSingle['game_id'] . '" hidden>
                                                                      <input type="number" name="event_id" value="' . $displayAllSingle['event_id'] . '" hidden>
                                                                      <input type="number" name="id" value="' . $displayAllSingle['id'] . '" hidden>
                                                                      <input type="text" name="type" value="' . $displayAllSingle['type'] . '" hidden>
                                                                      <input type="text" name="EliType" value="' . $displayAllSingle['EliType'] . '" hidden>
                                                                  </div>
                                                              </div>
                                                              <div class="modal-footer">
                                                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                  <input type="submit" class="btn btn-success" value="Confirm Score">
                                                              </div>
                                                          </form>
                                                      </div>
                                                  </div>
                                              </div>
                                              ';
                                          
                                              // View modal
                                              echo '
                                              <div class="modal fade" id="view' . $uniqueId . '" tabindex="-1" role="dialog" aria-labelledby="view' . $uniqueId . 'Label" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                          <form action="generateMatches.php" method="post">  
                                                              <div class="modal-header">
                                                                  <h5 class="modal-title" id="view' . $uniqueId . 'Label">Score Board</h5>
                                                              </div>
                                                              <div class="modal-body">
                                                                  <div class="form-group">
                                                                      <label>' . $displayAllSingle['team1_name'] . ' \'s Score: </label>
                                                                      <input type="number" name="teamOneScore" value="' . $displayAllSingle['team_one_score'] . '" class="form-control">
                                                                      <label>' . $displayAllSingle['team2_name'] . ' \'s Score: </label>
                                                                      <input type="number" name="teamTwoScore" value="' . $displayAllSingle['team_two_score'] . '" class="form-control">
                                                                      <input type="text" name="teamOneName" value="' . $displayAllSingle['team1_name'] . '" hidden>
                                                                      <input type="text" name="teamTwoName" value="' . $displayAllSingle['team2_name'] . '" hidden>
                                                                      <input type="number" name="team1_id" value="' . $displayAllSingle['team1'] . '" hidden>
                                                                      <input type="number" name="team2_id" value="' . $displayAllSingle['team2'] . '" hidden>
                                                                      <input type="text" name="game_type" value="' . $displayAllSingle['game_type'] . '" hidden>
                                                                      <input type="number" name="game_id" value="' . $displayAllSingle['game_id'] . '" hidden>
                                                                      <input type="number" name="event_id" value="' . $displayAllSingle['event_id'] . '" hidden>
                                                                      <input type="number" name="id" value="' . $displayAllSingle['id'] . '" hidden>
                                                                      <input type="text" name="type" value="' . $displayAllSingle['type'] . '" hidden>
                                                                      <input type="text" name="EliType" value="' . $displayAllSingle['EliType'] . '" hidden>
                                                                  </div>
                                                              </div>
                                                              <div class="modal-footer">
                                                                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>

                                                              
                                                              </div>
                                                          </form>
                                                      </div>
                                                  </div>
                                              </div>
                                              ';
                                          }
                                          
                                          echo '
                                                  </tbody>
                                              </table>
                                          </div>
                                          ';
                                                            
                                        }else if($type == 'double'){
                                          echo'
                                          <div class="table-responsive p-0">
                                                       <table class="table align-items-center mb-0">
                                                       <thead>
                                                           <tr>
                                                         <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Player</th>
                                                           <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Faction/Team</th>
                                                           <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Team Logo</th>
                                                           <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Game Type</th>
                                                           <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Options</th>
                                                           </tr>
                                                       </thead>
                                                       <tbody>
                                                           ';

                                                           $game_id = $_GET['game_id'];
                                                           $event_id = $_GET['event_id'];
                                                           $game_type = $_GET['game_type'];

                                                           $getPlayersForDouble = "SELECT * FROM game_matches WHERE game_id = '$game_id' AND event_id = '$event_id' AND type = 'double' AND (status = 'game' || status = 'SCORE')";
                                                            $queryForDouble = mysqli_query($conn,$getPlayersForDouble);

                                                           while($displayAllDouble = mysqli_fetch_assoc($queryForDouble)){
                                                              

                                                            if($displayAllDouble['team_one_score'] == 0 && $displayAllDouble['team_two_score'] == 0){
                                                                $winner = 'on-going';
                                                                $loser = 'on-going';

                                                            }else{
                                                                if( $displayAllDouble['team_one_score'] > $displayAllDouble['team_two_score']){
                                                                        $winner = $displayAllDouble['team1_name'] . ' and '. $displayAllDouble['team1_name1'];
                                                                        $loser = $displayAllDouble['team2_name'] . ' and ' . $displayAllDouble['team2_name2'];
                                                                }else{
                                                                    $winner = $displayAllDouble['team2_name'] . ' and ' . $displayAllDouble['team2_name2'];
                                                                    $loser = $displayAllDouble['team1_name'] . ' and '. $displayAllDouble['team1_name1'];
                                                                }
                                                            }

                                                            $uniqueId = $displayAllDouble['id'];
                                                            echo '
                                                            <tr>
                                                                  <td>
                                                                      <div class="d-flex px-2 py-1">
                                                                              '.$displayAllDouble['team1_name'].' and '.$displayAllDouble['team1_name1'].' <span style = "margin-left: 15px; color: orange; font-weight: bolder; margin-right: 15px;">VS</span> '.$displayAllDouble['team2_name'].' and '.$displayAllDouble['team2_name2'].'
                                                                      </div>
                                                                  </td>
                                                                  <td>
                                                                      <p class="text-xs font-weight-bold mb-0">'.$displayAllDouble['game_type'].'</p>
                                                                      <p class="text-xs text-secondary mb-0">single</p>
                                                                  </td>
                                                                  <td class="align-middle text-center text-sm">
                                                                      <span class="badge badge-sm bg-gradient-success">'.$winner.'</span>
                                                                  </td>
                                                                  <td class="align-middle text-center text-sm">
                                                                      <span class="badge badge-sm bg-gradient-danger">'.$loser.'</span>
                                                                  </td>
                                                                  <td class="align-middle text-center text-sm">
                                                                      ';
                                                                      if ($displayAllDouble['status'] == 'SCORE') {
                                                                        // Button to view score
                                                                        echo '<button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#view' . $uniqueId . '">View</button>';
                                                                    } else {
                                                                        // Disabled button with loading dots
                                                                        echo '<button disabled style="border: 1px solid grey; border-radius: 10px;">
                                                                                  <div class="loading-dots">
                                                                                      <span></span>
                                                                                      <span></span>
                                                                                      <span></span>
                                                                                  </div>
                                                                              </button>
                                                                              <style>
                                                                                  .loading-dots {
                                                                                      display: inline-block;
                                                                                  }
                                                                    
                                                                                  .loading-dots span {
                                                                                      display: inline-block;
                                                                                      width: 10px;
                                                                                      height: 10px;
                                                                                      margin: 0 3px;
                                                                                      background-color: #333;
                                                                                      border-radius: 50%;
                                                                                      animation: bounce 1.4s infinite ease-in-out both;
                                                                                  }
                                                                    
                                                                                  .loading-dots span:nth-child(1) {
                                                                                      animation-delay: -0.32s;
                                                                                  }
                                                                    
                                                                                  .loading-dots span:nth-child(2) {
                                                                                      animation-delay: -0.16s;
                                                                                  }
                                                                    
                                                                                  @keyframes bounce {
                                                                                      0%, 80%, 100% {
                                                                                          transform: scale(0);
                                                                                      }
                                                                                      40% {
                                                                                          transform: scale(1);
                                                                                      }
                                                                                  }
                                                                              </style>';
                                                                    }
                                                                    
                                                                    
                                                                      echo '
                                                                  </td>

                                                                  ';

                                                                  echo '
                                                                  <div class="modal fade" id="view' . $uniqueId . '" tabindex="-1" role="dialog" aria-labelledby="view' . $uniqueId . 'Label" aria-hidden="true">
                                                                      <div class="modal-dialog" role="document">
                                                                          <div class="modal-content">
                                                                              <form action="generateMatches.php" method="post">  
                                                                                  <div class="modal-header">
                                                                                      <h5 class="modal-title" id="view' . $uniqueId . 'Label">Score Board</h5>
                                                                                  </div>
                                                                                  <div class="modal-body">
                                                                                      <div class="form-group">
                                                                                          <label>' . $displayAllDouble['team1_name'] . ' \'s Score: </label>
                                                                                          <input type="number" name="teamOneScore" value="' . $displayAllDouble['team_one_score'] . '" class="form-control">
                                                                                          <label>' . $displayAllDouble['team2_name'] . ' \'s Score: </label>
                                                                                          <input type="number" name="teamTwoScore" value="' . $displayAllDouble['team_two_score'] . '" class="form-control">
                                                                                          <input type="text" name="teamOneName" value="' . $displayAllDouble['team1_name'] . '" hidden>
                                                                                          <input type="text" name="teamTwoName" value="' . $displayAllDouble['team2_name'] . '" hidden>
                                                                                          <input type="number" name="team1_id" value="' . $displayAllDouble['team1'] . '" hidden>
                                                                                          <input type="number" name="team2_id" value="' . $displayAllDouble['team2'] . '" hidden>
                                                                                          <input type="text" name="game_type" value="' . $displayAllDouble['game_type'] . '" hidden>
                                                                                          <input type="number" name="game_id" value="' . $displayAllDouble['game_id'] . '" hidden>
                                                                                          <input type="number" name="event_id" value="' . $displayAllDouble['event_id'] . '" hidden>
                                                                                          <input type="number" name="id" value="' . $displayAllDouble['id'] . '" hidden>
                                                                                          <input type="text" name="type" value="' . $displayAllDouble['type'] . '" hidden>
                                                                                          <input type="text" name="EliType" value="' . $displayAllDouble['EliType'] . '" hidden>
                                                                                      </div>
                                                                                  </div>
                                                                                  <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>


                                                                                  </div>
                                                                              </form>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                                  ';

                                                                  
                                                                  echo' 
                                                                  <div class="modal fade" id="score'.$uniqueId.'" tabindex="-1" role="dialog" aria-labelledby="score'.$uniqueId.'Label" aria-hidden="true">
                                                                       <div class="modal-dialog" role="document">
                                                                           <div class="modal-content">
                                                                               <form action="generateMatches.php" method="post">  
                                                                                        <div class="modal-header">
                                                                                         <h5 class="modal-title" id="score'.$uniqueId.'Label">Score Board</h5>
                                                                               
                                                                                       </div>
                                                                                       <div class="modal-body">
                                                                                               <div class="form-group">
                                                                                                    <label>'.$displayAllDouble['team1_name'].' and '.$displayAllDouble['team1_name1'].' \'s Score: </label>
                                                                                                    <input type = "number" name = "teamOneScore" value = '.$displayAllDouble['team_one_score'].' class = "form-control">

                                                                                                    <label>'.$displayAllDouble['team2_name'].' and '.$displayAllDouble['team2_name2'].' \'s Score: </label>
                                                                                                    <input type = "number" name = "teamTwoScore" value = '.$displayAllDouble['team_two_score'].' class = "form-control">

                                                                                                     <input type = "text" name = "teamOneName" value = '.$displayAllDouble['team1_name'].' hidden>
                                                                                                     <input type = "text" name = "teamTwoName" value = '.$displayAllDouble['team2_name'].' hidden>
                                                                                                      <input type = "number" name = "team1_id" value = '.$displayAllDouble['team1'].' hidden>
                                                                                                       <input type = "number" name = "team2_id" value = '.$displayAllDouble['team2'].' hidden>
                                                                                                       <input type = "text" name = "game_type" value = '.$displayAllDouble['game_type'].' hidden>
                                                                                                       <input type = "number" name = "game_id" value = '.$displayAllDouble['game_id'].' hidden>
                                                                                                        <input type = "number" name = "event_id" value = '.$displayAllDouble['event_id'].' hidden>
                                                                                                         <input type = "number" name = "id" value = '.$displayAllDouble['id'].' hidden>
                                                                                                         <input type = "text" name = "type" value = '.$displayAllDouble['type'].' hidden>
                                                                                                           <input type = "text" name = "EliType" value = '.$displayAllDouble['EliType'].' hidden>
                                                                                                         
                                                                                                         
                                                                                                 
                                                                                               ';   
                                                                                               
                                                                                               
                                       
                                                                                              echo' </div>
                                                                                       </div>
                                                                                       <div class="modal-footer">
                                                                                           <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                                           <input type = "submit" class="btn btn-success" value = "Confirm Score">
                                                                                       </div>
                                                                               </form>
                                                                           </div>
                                                                       </div>
                                                                       </div>

                                                                    
                                                              </tr>
                                                  ';
                                                        }


                                                
                                        }else{
                                          header('Location: score.php?event_id=' . urlencode($_SESSION['EVENT_ID']) . '&game_id=' . urlencode($_SESSION['GAME_ID']) . '&game_type=' . urlencode($_SESSION['GAME_TYPE']). '&type=' . urlencode($_SESSION['TYPE'])); 
                                        }

                                        echo '
                                        </tbody>
                                        </table>
                                    </div>    
                                    
                                    
                            ';

                                ?>

                        <!-- END SA MGA RUNS -->


              </div>


                                                        

                                                    <!-- end sa code nga ge butang -->

                                                    
                                            </div>
                                    </div>
                                </div>
                           

                           

                            

                         </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
      
      </div>
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              
                <li class="nav-item">
                  <a href="#" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <div class="fixed-plugin">
   
    <div class="card shadow-lg ">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3">
          <h6 class="mb-0">Navbar Fixed</h6>
        </div>
        <div class="form-check form-switch ps-0">
          <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
        </div>
        <hr class="horizontal dark my-sm-4">
        <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/soft-ui-dashboard">Free Download</a>
        <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/soft-ui-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Soft%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/soft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
     <!-- Bootstrap JS and dependencies -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="../template/AdminTemplate/assets/js/core/popper.min.js"></script>
  <script src="../template/AdminTemplate/assets/js/core/bootstrap.min.js"></script>
  <script src="../template/AdminTemplate/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../template/AdminTemplate/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../template/AdminTemplate/assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>