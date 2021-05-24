<?php
    $conn = mysqli_connect("localhost","root","","Progetto_Esame");
    $query = "SELECT Nome,Città,Telefono,Stelle FROM Hotel";
    $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));
    while($row = mysqli_fetch_assoc($res))
    {
        $array[]=$row;
    }
    $json = json_encode($array);
    echo $json;
    mysqli_close($conn);
?>