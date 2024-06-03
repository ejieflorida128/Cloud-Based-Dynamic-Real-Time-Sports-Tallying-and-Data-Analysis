<?php
            include('connection/conn.php');


            $id = $_GET['id'];

            $sql = "UPDATE accounts SET status = 'approved' WHERE id = $id";
            mysqli_query($conn,$sql);

            header('Location: loadToAdminUserTable.php');
?>