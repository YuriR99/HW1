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
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Inconsolata&family=Merriweather&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Inconsolata&family=Merriweather&family=Pangolin&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Inconsolata&family=Lobster&family=Merriweather&family=Pangolin&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@500&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <div id="Testo1">
                <div id="detTesto">
                    Find Your Hotel
                    Quickly And Easily With <strong>Easy Hotels !</strong>
                </div>
            </div>
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
        </header>
            <section>
              <div id="Testo">
                <div id="Testo2">
                <h1>Ecco Cosa Puoi Fare Nel Nostro Sito</h1>
                </div>
                <div id="linea"></div>
              </div>
                <div class="det">
                    <div id="I1">
                        <img src="ricercahotel1.jpg">
                        <p>Nel nostro sito potrai cercare l'hotel più adatto a te</p>
                        <h1>Cliccando su Cerca Hotel</h1>
                    </div>
                    <div id="I2">
                        <img src="prenotazioni.jpg">
                        <p>Puoi gestire le tue prenotazioni facilmente</p>
                        <h1>Cliccando su Le Tue Prenotazioni</h1>
                        </div>
                </div>
                <div class="det">
                    <div id="I3">
                        <img src="Recensioni.jpg">
                        <p>Puoi anche lasciare una recensione con un voto da 1 a 5</p>
                        <p>cosi potrai aiutare altre persone con le proprie ricerche</p>
                        <h1>Cliccando su Recensioni</h1>
                    </div>
                </div>
            </section>
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