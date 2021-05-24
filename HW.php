<?php


   //header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","","Progetto_Esame") or die("Errore: ".mysqli_connect_error());
$query = "
        SELECT S.Tipo,count(P.Codice_Prenotazione)
        FROM (Hotel H JOIN Stanza S ON H.Codice = S.Codice_Hotel) JOIN Prenotazione P ON P.Codice_HS = S.ID_Stanza 
        WHERE H.Valutazione_Media >= 5
        GROUP BY S.Tipo";
$res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));
while($row = mysqli_fetch_assoc($res))
{
    print_r($row);
    //echo json_encode($row);
}
?>