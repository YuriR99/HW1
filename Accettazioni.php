<?php
    $utente = "";
    include 'auth.php';
    if (checkAuth()) {
        $utente= $_SESSION['username'];
    }
    $conn = mysqli_connect("localhost","root","","Progetto_Esame");
    $query = "SELECT A.Nome_Hotel,A.Tipo_Stanza,A.Data_In FROM accettazione A JOIN cliente C ON C.ID = A.Id_Utente WHERE  C.Username = '$utente'";
    $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));
    while($row = mysqli_fetch_assoc($res))
    {
        $array[]=$row;
    }
    $json = json_encode($array);
    echo $json;
    mysqli_close($conn);
?>