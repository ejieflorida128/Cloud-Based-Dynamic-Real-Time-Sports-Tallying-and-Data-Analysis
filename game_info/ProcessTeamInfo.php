<?php

session_start();
include('../connection/conn.php');    


if($_SERVER['REQUEST_METHOD'] == "POST"){

    $id = $_SESSION['idOfTeam'];

    $number_of_player = $_POST['player_count'];


    if($number_of_player >= 5){
      $team_name = $_POST['team_name'];
      

       // Handle the file upload
              if (isset($_FILES['changeLogoPicture']) && $_FILES['changeLogoPicture']['error'] == UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['changeLogoPicture']['tmp_name'];
                $fileName = $_FILES['changeLogoPicture']['name'];
                $fileSize = $_FILES['changeLogoPicture']['size'];
                $fileType = $_FILES['changeLogoPicture']['type'];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));

                // Allowed file extensions
                $allowedfileExtensions = ['jpg', 'png', 'jpeg', 'gif','webp'];
                if (in_array($fileExtension, $allowedfileExtensions)) {
                    // Specify the path where the file is going to be stored
                    $uploadFileDir = '../logo/';
                    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                    $dest_path = $uploadFileDir . $newFileName;

                    // Move the file to the desired directory
                    if (move_uploaded_file($fileTmpPath, $dest_path)) {
                        // File successfully uploaded, update database
                        $updateLogoQuery = "UPDATE teams SET logo = '$dest_path' WHERE id = $id";
                        mysqli_query($conn, $updateLogoQuery);
                    } else {
                        echo 'There was some error moving the file to the upload directory.';
                    }
                } else {
                    echo 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
                }
            } else {
                echo "Logo photo not uploaded!";
            }

            $sqlForChanges = "UPDATE teams SET team_name = '$team_name', number_of_player = '$number_of_player', status = 'detailed' WHERE id = $id";
            mysqli_query($conn,$sqlForChanges);

            header('Location: addTeamMember.php?id='.urldecode($id));
            

    }else{
          // when kuan like if below 5 ra ang player na ge assign automatic dle mo proceed 
    }





  }
?>

