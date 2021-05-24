<?php
$conn = mysqli_connect("localhost","root","","Progetto_Esame");
$query = "SELECT C.Username,H.Nome,V.Voto FROM valuta V JOIN hotel H ON H.Codice = V.Codice_Hotel JOIN cliente C ON C.ID = V.Persona";
$res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));
while($row = mysqli_fetch_assoc($res))
{
    $array[]=$row;
}
$json = json_encode($array);
echo $json;
mysqli_close($conn);
?>