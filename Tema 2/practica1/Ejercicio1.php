<?php
    include_once("cabecera.php");
    echo ("<h1 style='text-shadow: 2px 2px #ff0000; color:black '>Ejercicio 1</h1>");
    //rand es la funcion de num random solo hay que poner rand() para que te de un num random tambien puede ponerlo con rango
    $primera = rand();
    $segunda = rand();

    echo ("La diferencia de ".$primera." - ".$segunda."=".($primera-$segunda));
    echo ("<br/>La division de ".$primera." / ".$segunda."=".($primera/$segunda));

    include_once("pie.php");
?>