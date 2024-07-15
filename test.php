<?php
include('connection/conn.php');

//         $sql = "SELECT * FROM game_matches WHERE game_id = 2 AND event_id = 2 AND (status = 'SCORE' OR match_info = 'BYE')";
//         $query = mysqli_query($conn,$sql);
//         $cnt = 0;
//         while($count = mysqli_fetch_assoc($query)){
//             $cnt++;

//         }


//  echo $cnt;

// $sql = "DELETE FROM game_matches WHERE game_id = 1 AND event_id = 1 AND match_info = 'BYE'";
//     if(mysqli_query($conn,$sql)){
//         echo 'delete succesfully';
//     }


//  $sql = "SELECT * FROM game_matches WHERE event_id = 2 AND game_id = 2 AND (match_info = 'BYE' OR status = 'SCORE') ORDER BY id DESC";
//  $query = mysqli_query($conn,$sql);

//  while($test = mysqli_fetch_assoc($query)){
//         echo $test['id']. '<br>';
//  }

$sql = "SELECT id FROM game_matches WHERE status = 'SCORE'AND event_id = 1 AND game_id = 1 ORDER BY id DESC LIMIT 1";
$query = mysqli_query($conn,$sql);
$result = mysqli_fetch_assoc($query);



echo $result['id'];
?>