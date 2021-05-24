<?php
$utente = "";
include 'auth.php';
if (checkAuth()) {
    $utente= $_SESSION['username'];
}

$conn = mysqli_connect("localhost","root","","Progetto_Esame");
    $query =   "SELECT H.Nome,H.Città,H.Telefono,H.Stelle,P.Data_Check_In,P.Data_Check_Out,S.Tipo
                FROM Cliente C JOIN Prenotazione P ON P.Persona = C.ID JOIN Stanza S ON S.ID_Stanza = P.Codice_HS JOIN Hotel H ON H.Codice = S.Codice_Hotel
                WHERE C.Username = '$utente';";
    $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));
    while($row = mysqli_fetch_assoc($res))
    {
        $array[]=$row;
    }
    $json = json_encode($array);
    echo $json;
    mysqli_close($conn);
?>

