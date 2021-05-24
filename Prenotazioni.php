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
        <script src="prenotazioni.js" defer="true"></script>
        <script src="Accettazioni.js" defer="true"></script>
    </head>
    <body>
        <header id="Prenota">
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
                <?php
                    if(checkAuth()){
                       echo "<a href='Profilo_Utente.php' id='utente' class='button link'>Profilo $utente</a>";
                            
                    }else{
                        echo    "<div id='login'>
                                <a href='Login.php' class='button' class='link'>Login/Sign In</a>
                                </div>";
                    }
                ?>
                <div id="menu">
                    <div></div>
                    <div></div>
                    <div></div>
                  </div>
            </nav>
            <?php
                if(!checkAuth()){
                    echo "<div class='Attenzione'><h1>Per poter visionare lo storico delle prenotazione bisogna essere iscritti</h1> <a href='Login.php' class='button' class='link'>Accedo o Registrati</a></div>";
                }else{
                    echo "<div id='Prenotazioni'>
                    <h1>Storico Prenotazioni</h1>
                    </div>
                    <div id ='IA'>
                    <h1>Le Tue Prenotazioni In Fase D'Accettazione</h1>
                    </div>";

                }
            ?>
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