<?php
    include_once("cabecera.php");
    echo ("<h1 style='text-shadow: 2px 2px #ff0000; color:black '>Ejercicio 8</h1>");

    //Array con los 6 numeros random de la loteria
    $numL = array(rand(00,99), rand(00,99), rand(00,99), rand(00,99), rand(00,99), rand(00,99));
    //Complementario y reintegro del numero de loteria
    $complementario = rand(00, 99);
    $reintegro = rand(00, 99);

    echo ("El numero de loreria es: ");
    //foreach para leer el array
    foreach($numL as $num){
        echo $num." ";
    }
    echo ($complementario." ".$reintegro);

    include_once("pie.php");
?>