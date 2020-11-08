<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Ejercicio 3 Ismael</title>
</head>

<body>
    <div class="contenedor">
        <?php
        session_start();
        //session_destroy();
        echo "<h1 style='text-shadow: 2px 2px #ff0000; color:black '>Ejercicio 3</h1>";
        $paginaTrump = file_get_contents('https://edition.cnn.com/');
        $cont = 0;

        file_put_contents("news.html", $paginaTrump);

        for ($i = 0; $i < substr_count($paginaTrump, 'Trump'); $i++) {
            if(strpos($paginaTrump, 'Trump')>-1){
                $cont++;
            }
        }
        echo "<h4>La palabra Trump aparece un total de ".$cont." veces.</h4>";
        echo '<br/><img src="img/trump.png" alt="" style="width:65%">';
        ?>
    </div>
</body>

</html>