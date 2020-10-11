<?php
    include_once("cabecera.php");
    echo ("<h1 style='text-shadow: 2px 2px #ff0000; color:black '>Ejercicio 4</h1>");
    //La variable radio tiene el valor radio que es un numero random
    $a = rand();
    $b = rand();
    $c = rand();

    //Vamos a crear la variable volumen para tener guadado la formula en ella
    $volumen = (4/3)*(3.14*$radio);
    echo ("Radio del circulo es: ".$radio);
    echo ("<br/>El volumen del circulo es: ".$volumen);

    include_once("pie.php");
?>