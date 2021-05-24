<?php
$Nome = $_GET['Nome'];
$conn = mysqli_connect("localhost","root","","Progetto_Esame");
$query = "SELECT Codice FROM hotel WHERE Nome = '$Nome'";
$res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));
while($row = mysqli_fetch_assoc($res))
{
    $array[]=$row;
}
$json = json_encode($array);
echo $json;
mysqli_close($conn);
?>