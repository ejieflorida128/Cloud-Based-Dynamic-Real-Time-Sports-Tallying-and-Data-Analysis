<?php
session_start();
include('connection/conn.php');

$id = $_SESSION['id'];

$update = "UPDATE accounts SET net = 'offline' WHERE id = $id";
mysqli_query($conn,$update);



header('Location: loadToIndex.php');
?>