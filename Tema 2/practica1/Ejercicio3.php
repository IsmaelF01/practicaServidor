<?php
    echo ("<h1>Ejercicio3</h1>");
    //La variable radio tiene el valor radio que es un numero random
    $radio = rand();

    //Vamos a crear la variable volumen para tener guadado la formula en ella
    $volumen = (4/3)*(3.14*$radio);
    echo ("Radio del circulo es: ".$radio);
    echo ("<br/>El volumen del circulo es: ".$volumen);

?>