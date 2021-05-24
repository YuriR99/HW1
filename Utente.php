<?php
    include 'auth.php';
    if (checkAuth()) {
        header('Location: MHW.php');
        exit;
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
    </head>
    <body>
        <header id="loginS">
            <nav>
                <div id="Barra">
                    <div id="logo">
                        <img src="Logo H.png"/>
                    </div>
                </div>
                <div id="Barra2">
                    <a href="MHW.html" class="link">Home</a>
                    <a href="MHW3.html" class="link">Recensioni</a>
                    <a href="MHW2.html" class="link">Cerca Hotel</a>
                    <a href="MHW4.html" class="link">Le Tue Prenotazioni</a>
                </div>
                <div>
                </div>
                <div id="menu">
                    <div></div>
                    <div></div>
                    <div></div>
                  </div>
            </nav>
                 <?php
                     if(!isset($_POST['invia_dati'])) {
                 ?>
                <form method='post' id="Log"> 
                    <p><label>Username <input type='text' name='username'></label></p>
                    <p><label>Password <input type='password' name='password'></label></p>
                    <p><label><input type='submit' name='invia_dati'></label></p>
                    <h3>Se non sei iscritto clicca su: <a href="Registrazione.php" class="SL link">Sign In</a></h3>
                </form>
                <?php
                     } else {
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        if($username == "" || $password == ""){
                        echo "Devi compilare tutti campi";
                        }else {
                            $conn = mysqli_connect("localhost","root","","Progetto_Esame");
                            $query = "SELECT * FROM cliente WHERE Username = '$username'";
                            $res = mysqli_query($conn, $query);
                            if($res){
                                $array = mysqli_fetch_array($res);
                                $Id = $array['ID'];
                         $nome = $array['Nome'];
                         $cognome = $array['Cognome'];
                         $usernamedb = $array['Username'];
                         $passworddb = $array['Pass'];
                         if(password_verify($password,$passworddb)){
                             $email = $array['email'];
                             $dataN = $array['dataN'];
                             $telefono = $array['telefono'];
                             
                             session_start();
                             $_SESSION['username'] = $usernamedb;
                             header("Location: MHW.php");
                            }else {
                             echo "<div id='errorP'><h1>ERRORE:Password Errata</h1></div>";
                            }   
                            }else {
                                echo "L'utente non esiste";
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