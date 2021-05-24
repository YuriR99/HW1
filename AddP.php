<?php
    $Data = $_GET['Data'];
    $Hotel = $_GET['NomeH'];
    $Stanza = $_GET['Stanza'];
    $utente = "";
    include 'auth.php';
    if (checkAuth()) {
        $utente= $_SESSION['username'];
    }
    $conn = mysqli_connect("localhost","root","","Progetto_Esame");
                    $query = "SELECT ID FROM cliente WHERE Username = 'AR'";
                    $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));
                    if($res){
                        $array = mysqli_fetch_array($res);
                        $Id = $array['ID'];
                    }
    $query2 = "INSERT into accettazione (ID,Id_Utente,Nome_Hotel,Tipo_Stanza,Data_In) VALUES (0,'$Id','$Hotel','$Stanza','$Data')";
    $res2 = mysqli_query($conn, $query2) or die("Errore: ".mysqli_error($conn));
    if($query2){
      echo "Fatto";
    }
?>