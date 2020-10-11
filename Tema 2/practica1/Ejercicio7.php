<?php
    include_once("cabecera.php");
    echo ("<h1 style='text-shadow: 2px 2px #ff0000; color:black '>Ejercicio 7</h1>");

//Array con los 5 numeros random
    $array = array(rand(0,9), rand(0,9), rand(0,9), rand(0,9), rand(0,9));

//foreach para leer el array
    foreach ($array as $num){
        //for para hacer la tabla de multiplicar
        for($i = 0; $i <= 10; $i++){
            echo ($i."x".$num." = ".($i*$num)."<br/>");
        }
        echo ("<br/>");
    }


    include_once("pie.php");
?>