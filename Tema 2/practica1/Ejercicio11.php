
<?php
    echo ("<h1>Ejercicio 11</h1>");
    

    //Array en dos dimensiones de 7x7 con numeros random del 0 al 9
    $nums = array(
        array (1, rand(0,9), rand(0,9), rand(0,9), rand(0,9), rand(0,9), 1),
        array (rand(0,9), 1, rand(0,9), rand(0,9), rand(0,9), 1, rand(0,9)),
        array (rand(0,9), rand(0,9), 1, rand(0,9), 1, rand(0,9), rand(0,9)),
        array (rand(0,9), rand(0,9), rand(0,9), 1, rand(0,9), rand(0,9), rand(0,9)),
        array (rand(0,9), rand(0,9), 1, rand(0,9), 1, rand(0,9), rand(0,9)),
        array (rand(0,9), 1, rand(0,9), rand(0,9), rand(0,9), 1, rand(0,9)),
        array (1, rand(0,9), rand(0,9), rand(0,9), rand(0,9), rand(0,9), 1),
    );
    $sumF = 0;
    $sumC = 0;

    //For para pintar el array
    foreach($nums as $row){
        foreach($row as $col){
            echo($col);
            $sumF ++;
            $sumC ++;
        }
        echo "<br/>";
    }

    //Echo para pintar los num de fila y de columnas que tiene el array
    echo ("la suma de la filas es: ".sqrt($sumF));
    echo ("<br/>La suma de las columnas es: ".sqrt($sumC));

    


?>