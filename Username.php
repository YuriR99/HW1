<?php
        header("Content-Type: application/json");

        $conn = mysqli_connect("localhost","root","","Progetto_Esame");
        $username = mysqli_real_escape_string($conn, $_GET['q']);
        $query = "SELECT username FROM cliente WHERE username = '$username'";
        $res = mysqli_query($conn, $query);

        $json_array = array('exists' => mysqli_num_rows($res) > 0 ? true : false);
        $json = json_encode($json_array);
        echo $json;
        mysqli_close($conn);
?>