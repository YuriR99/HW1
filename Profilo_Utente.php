<?php
    $utente = "";
    include 'auth.php';
    if (checkAuth()) {
        $utente= $_SESSION['username'];
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Easy Hotels</title>
        <link rel="stylesheet" href="MHW.css"/>
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet"> 
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
        <script src="Preferiti.js" defer="true"></script>
    </head>
    <body>
        <header id="P_Utente">
            <nav>
                <div id="Barra">
                    <div id="logo">
                        <img src="Logo H.png"/>
                    </div>
                </div>
                <div id="Barra2">
                    <a href="MHW.php" class="link">Home</a>
                    <a href="Recensioni.php" class="link">Recensioni</a>
                    <a href="MHW2.php" class="link">Cerca Hotel</a>
                    <a href="Prenotazioni.php" class="link">Le Tue Prenotazioni</a>
                </div>
                <div>
                </div>
                <div id="menu">
                    <div></div>
                    <div></div>
                    <div></div>
                  </div>
            </nav>
            <div id="Info_U">
                <?php
                    $conn = mysqli_connect("localhost","root","","Progetto_Esame");
                    $query = "SELECT * FROM cliente WHERE Username = '$utente'";
                    $res = mysqli_query($conn, $query);
                    if($res){
                        $array = mysqli_fetch_array($res);
                        $Id = $array['ID'];
                        $nome = $array['Nome'];
                        $cognome = $array['Cognome'];
                        $usernamedb = $array['Username'];
                        $passworddb = $array['Pass'];
                        $email = $array['Email'];
                        $dataN = $array['Data_N'];
                        $telefono = $array['Telefono'];
                         echo"<table>
                            <tr><td>Nome:</td><td>$nome</td></tr>
                            <tr><td>Cognome:</td><td>$cognome</td></tr>
                            <tr><td>Username:</td><td>$usernamedb</td></tr>
                            <tr><td>Email:</td><td>$email</td></tr>
                            <tr><td>Data Di Nascita:</td><td>$dataN</td></tr>
                            <tr><td>Telefono:</td><td>$telefono</td></tr>
                            </table>";
                        } 
                ?>
                <br>
                <a href="Logout.php" id="logout" class="button link">Logout</a>
                <a id="Pref" class="button link">Preferiti</a>
            </div>
            <div id="Pref_U" class='N'>
                        <h1>I Tuoi Hotel Preferiti</h1>
            </div>
        </header>
        <footer>
            <div id="loghi">
                <img src="Logo instagram.png">
                <img src="Logo facebook.png">
                </div>
                <p><b>Yuri Alfio Randazzo</b><br>
                <b>O46002285</b>
                </p>
        </footer>
    </body>
</html>