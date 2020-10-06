<?php
echo ("<h1>Ejercicio7</h1>");

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

?>