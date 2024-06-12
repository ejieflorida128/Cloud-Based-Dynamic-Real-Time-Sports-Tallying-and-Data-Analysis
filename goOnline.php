<?php
session_start();
include('connection/conn.php');

$id = $_SESSION['id'];

$update = "UPDATE accounts SET net = 'online' WHERE id = $id";
mysqli_query($conn,$update);



header('Location: loadToDashboard.php');
?>