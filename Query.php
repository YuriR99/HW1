<?php   
$utente = "";
include 'auth.php';
if (checkAuth()) {
    $utente= $_SESSION['username'];
}
$conn = mysqli_connect("localhost","root","","Progetto_Esame") or die("Errore: ".mysqli_connect_error());;
$query = "  SELECT *
            FROM Prenotazione P1
            WHERE EXISTS(SELECT C.ID FROM Cliente C JOIN Prenotazione P ON P.Persona = C.ID WHERE C.Username = '$utente')";
$res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));
while($row = mysqli_fetch_assoc($res))
{
    echo json_encode($row);
}
?>