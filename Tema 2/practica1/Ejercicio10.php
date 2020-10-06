
<?php
    echo ("<h1>Ejercicio 10</h1>");
    
    $nums = array(rand(0,9), rand(0,9), rand(0,9), rand(0,9), rand(0,9), rand(0,9), rand(0,9), rand(0,9), rand(0,9), rand(0,9));
    $cont = 1;
    $media = 0;
    $impares = 0;
    foreach($nums as $num){
        if($num%2==0){
            $media += $num;
            $media = $media/$cont;
            $cont++;
        }else{
            $impares += $num;
        }
    }
    echo ("La media es: ".$media);
    echo ("<br/>Los impares son: ".$impares);

    


?>