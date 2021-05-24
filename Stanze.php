<?php
    $Nome=$_GET['NomeH'];
    $conn = mysqli_connect("localhost","root","","Progetto_Esame");
    $query =   "SELECT S.Piano,S.Tipo FROM Hotel H JOIN Stanza S ON S.Codice_Hotel = H.Codice WHERE H.Nome = '$Nome'";
    $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));
    while($row = mysqli_fetch_assoc($res))
    {
        $array[]=$row;
    }
    $json = json_encode($array);
    echo $json;
    mysqli_close($conn);
?>