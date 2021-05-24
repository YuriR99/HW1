<?php
    $Id_H = $_GET['Cod'];
    $Voto = $_GET['Voto'];
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
    $query2 = "INSERT into valuta (Persona,Codice_Hotel,Voto) VALUES ('$Id','$Id_H','$Voto')";
    $res = mysqli_query($conn, $query2);
    if($query2){
        echo "Fatto";
    }
?>