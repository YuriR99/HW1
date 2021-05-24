<?php
    $utente = "";
    include 'auth.php';
    if (checkAuth()) {
    $utente= $_SESSION['username'];
    }
    $Hotel = "";
    $conn = mysqli_connect("localhost","root","","Progetto_Esame");
    $query = "SELECT ID FROM cliente WHERE Username = '$utente'";
    $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));
    if($res){
        $array = mysqli_fetch_array($res);
        $Id = $array['ID'];
        echo $Id;
    }
    $Hotel = $_GET['Hotel'];
    $query2 = "INSERT into preferiti(ID,Id_Utente,Nome_Hotel) VALUES (0,'$Id','$Hotel')";
    $res = mysqli_query($conn, $query2);
    if($query2){
        echo "Fatto";
    }
?>