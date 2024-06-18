<?php
    session_start();
    include('../connection/conn.php');

        $id = $_GET['id'];

            $sql = "UPDATE teams SET status = 'drop' WHERE id = $id";
            mysqli_query($conn,$sql);

            header('Location: needInformation.php');
?>