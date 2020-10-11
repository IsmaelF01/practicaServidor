<?php
    include_once("cabecera.php");
    echo ("<h1 style='text-shadow: 2px 2px #ff0000; color:black '>Ejercicio 2</h1>");
    //La cadena3 tiene concatenada la cadena1 y cadena2
    $cadena1 = "hola a todo el mundo";
    $cadena2 = " mi nombre es Ismael Flores Sánchez";
    $cadena3 = ($cadena1.$cadena2);

    echo ("Cadena 3 es: ".$cadena3);
    echo ("<br/>Cadena 1 es: ". $cadena1.$cadena2);

    include_once("pie.php");
?>