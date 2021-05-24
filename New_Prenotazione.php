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
                if(!(isset($_POST['invia_dati']))) {
            ?>
            <form name='signup' method='post' id="Reg"> 
                    <p><label>Data Check In<input type='date' name='Check In'></label></p>
                    <p><label>Data Check Out<input type='date' name='Check Ont'></label></p>
                    <p><label><input type='submit' name="invia_dati" value="Registrati" id="submit"></label></p>
                <h3>Se sei già iscritto clicca su: <a href="Login.php" class="SL link">Login</a></h3>
            </form>
            <?php
                } else {
                    $nome = $_POST['nome'];
                    $cognome = $_POST['cognome'];
                    $email = $_POST['email'];
                    $telefono = $_POST['Telefono'];
                    $username = $_POST['user'];
                    $password = $_POST['password'];
                    if(strlen($password)<4){
                        echo "<br><span>La Password Deve Contenre minimo 4 Caratteri </span>";
                    }
                    $confPassword = $_POST['CPassword'];
                    $data = $_POST['data'];

                        if($nome == "" || $cognome == "" || $email == "" || $telefono == "" || $username == "" || $password == "" || $confPassword == "" || $data == "") {
                                
                            echo "Devi compilari tutti i campi";
                        } else if($password != $confPassword) {
                            echo "La password non coincide";
                        } else {
                            $password = password_hash($password, PASSWORD_BCRYPT);
                            $conn = mysqli_connect("localhost","root","","Progetto_Esame");
                            $query = "INSERT into cliente (ID,Nome,Cognome,Username,Pass,Email,Data_N,Telefono) VALUES (0,'$nome','$cognome','$username','$password','$email','$data','$telefono')";
                            
                            $res = mysqli_query($conn, $query);
                            if($query){
                                echo "Registrazione effettuata con successo";
                            }
                        }
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