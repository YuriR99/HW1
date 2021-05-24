<!DOCTYPE html>
<html>
    <head>
        <title>Test</title>
    </head>
    <body>
        <?php
            //Stampa
            //echo ' Hello World ';

            //variabili
            $nome= 'Giorgio';
            $anni= 22;
            /*echo 'Nome: ' .$nome. ' Anni: ' .$anni;
             Stampare con i puntini che servono per collegare ciò che scrivo con le variaboli*/

             //Sintassi più semplice

             echo "Ciao sono $nome e ho $anni anni.";
        ?>
    </body>
</html>

<?php

//per andare a capo basta fare  echo '<br>'


/*
String
Integer
Float
Boolean
Array
Object
Null
Resource
*/

/*
$str = "ciao";
$intVal = 10;
$floatval = 2.554;
$booleanVal = TRUE;
$nullval = NULL;
$arr1 = array('nome'=>'Giorgio','anni'=>22); oppure $arr2 = ['paese'=>'italia','numero_di_telefono'=>'347'];
*/

//Come vedere se le php visualizzi le nostre variabili nel modo corretto
//var_dump($str);


//convertire le variabili
/*$a = 10;
$b = (string)$a;
$a = (float)$a;

$str = (bool)$str;

Cosa è FALSE in php:
-int 0
-float 0.0
-Stringa vuota ''
-Stringa '0' oppure "0"
-array con zero elementi

I restanti valori sono considerati TRUE
*/



/* 
Operatori matematici
Operatori di incremento(++ --)
Operatore di confronto (<,<=,>,>=;==,!=,===,!==,<=> introdoppo in php7)
Operatori Logici (AND,OR,&&,||,!)

.=  , +=  , -= 
*/
?>