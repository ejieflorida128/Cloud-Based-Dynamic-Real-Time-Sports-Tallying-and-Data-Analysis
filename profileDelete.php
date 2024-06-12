<?php
    session_start();
    include('connection/conn.php');


    $id = $_SESSION['id'];

    $sql = "DELETE FROM accounts WHERE id = $id";
    mysqli_query($conn,$sql);

    header('Location: loadToIndex.php');


?>

