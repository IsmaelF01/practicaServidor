
<?php
    include_once("cabecera.php");
    echo ("<h1 style='text-shadow: 2px 2px #ff0000; color:black '>Ejercicio 9</h1>");

    //Array con varios colores
    $colores = array("black", "gray", "red", "blue", "yellow", "green", "orenage", "brown", "pink", "violet", "purple", "golden", "silver");
    //For para hacer los 5 circulos circulo
    for($i=0; $i <5; $i++){
        $random = rand(0, count($colores)-1);
        echo "<svg height='100' width='100'>
        <circle cx='50' cy='50' r='40' ; stroke-width='3' fill='$colores[$random]' />
        </svg>";
    }


    include_once("pie.php");
?>