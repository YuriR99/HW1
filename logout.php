<?php
    mysqli_connect("localhost","root","","Progetto_Esame");
    session_start();
    session_destroy();

    header('Location: login.php');
?>