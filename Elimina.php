<?php
    $NH = "";
    $utente = "";
    include 'auth.php';
    if (checkAuth()) {
        $utente= $_SESSION['username'];
    }
    $conn = mysqli_connect("localhost","root","","Progetto_Esame");
    $query = "SELECT ID FROM cliente WHERE Username = '$utente'";
    $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));
    if($res){
        $array = mysqli_fetch_array($res);
        $Id = $array['ID'];
        echo $Id;
    }
    $NH = $_GET['NomeH'];
    echo $NH;
    $query2 = "DELETE FROM preferiti WHERE  Id_Utente = $Id AND Nome_Hotel = '$NH'" ;
    $res = mysqli_query($conn, $query2) or die("Errore: ".mysqli_error($conn));
    if($res){
        echo "Eliminato";
    }

?>