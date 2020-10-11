<?php
    include_once("cabecera.php");
    echo ("<h1 style='text-shadow: 2px 2px #ff0000; color:black '>Ejercicio 5</h1>");

    //Random de un rango de 0 a 99
    $random = rand(0 , 99);
    $decenas = bcdiv(($random/10), '1', 0);
    $unidades = $random % 10;

    /*echo ($random);
    echo ("<br/>".$decenas);
    echo ("<br/>".$unidades);*/

    //Switch para las decenas
    switch ($decenas){
        case '0':
            echo "";
        break;
        case '1':
            echo "Diez";
        break;
        case '2':
            echo "Veinte";
        break;
        case '3':
            echo "Treinta";
        break;
        case '4':
            echo "Cuarenta";
        break;
        case '5':
            echo "Cincuenta";
        break;
        case '6':
            echo "Sesenta";
        break;
        case '7':
            echo "Setenta";
        break;
        case '8':
            echo "Ochenta";
        break;
        case '9':
            echo "Noventa";
        break;        
    }
    echo " y ";

    //Switch para las unidades
    switch ($unidades){
        case '0':
            echo "Cero";
        break;
        case '1':
            echo "Uno";
        break;
        case '2':
            echo "Dos";
        break;
        case '3':
            echo "Tres";
        break;
        case '4':
            echo "Cuatro";
        break;
        case '5':
            echo "Cinco";
        break;
        case '6':
            echo "Seis";
        break;
        case '7':
            echo "Siete";
        break;
        case '8':
            echo "Ocho";
        break;
        case '9':
            echo "Nueve";
        break;        
    }


    include_once("pie.php");
?>