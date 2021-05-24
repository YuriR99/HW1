<?php
    
    mysqli_connect("localhost","root","","Progetto_Esame");
    session_start();

    function checkAuth() {
        if(isset($_SESSION['username'])) {
            return $_SESSION['username'];
        } else 
            return 0;
    }
?>