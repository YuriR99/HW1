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
        <script src="Valutazioni.js" defer="true"></script>
    </head>
    <body>
        <header id="Recensioni">
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
                    echo "<div class='Attenzione'><h1>Per poter visualizzare o lasciare una recensione</h1> <a href='Login.php' class='button' class='link'>Accedo o Registrati</a></div>";
                }else{
                            echo    "<section id = 'voti'>
                                    <div Id='VotiU'><h1>Ecco I Voti Dei Nostri Utenti</h1></div>
                                    <div id='VotiH'><h1>Le Valutazioni Dei Nostri Hotel</h1>
                                    <div class='lineaHV'></div></div>
                                    </section>";
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